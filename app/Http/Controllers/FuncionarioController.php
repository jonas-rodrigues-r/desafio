<?php

namespace App\Http\Controllers;

use App\Http\Requests\FuncionarioRequest;
use App\Http\Requests\LoginRequest;
use App\Models\FilialModel;
use App\Models\FuncionarioModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Requests;
use Session;

require_once 'includes/functions.php';
require_once 'includes/constantes.php';

class FuncionarioController extends Controller
{
    private $objFunc;
    private $objFilial;

    public function __construct()
    {
        $this->objFilial = new FilialModel();
        $this->objFunc = new FuncionarioModel();
        $this->filial = $this->objFilial->all();
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Session::has('login')) {return redirect('/');}
        $funcionario = $this->objFunc->all();
        return view('FuncionarioView/index', compact('funcionario'));
    }

    public function create()
    {
        if (!Session::has('login')) {return redirect('/');}
        $filial = $this->filial;
        $password = $this->generatePassword();
        return view('FuncionarioView/create', compact('filial', 'password'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FuncionarioRequest $request)
    {
        $validaCpf = FuncionarioModel::where('cpf', removeCaract($request->cpf))->first();
        if ($validaCpf) {
            $filial = $this->filial;
            $valida = array("O CPF $request->cpf ".MSG04);
            return view('FuncionarioView/create', compact('filial'))
                ->withErrors($valida);
        }

        $cad = $this->objFunc->create([
            'nome' => $request->nome,
            'data_nascimento' => formatDtBd($request->data_nascimento),
            'sexo' => $request->sexo,
            'cpf' => removeCaract($request->cpf),
            'endereco' => $request->endereco,
            'cargo' => $request->cargo,
            'salario' => removeMaskDinheiro($request->salario),
            'situacao' => $request->situacao,
            'password' => Hash::make($request->password),
            'id_filial' => $request->id_filial,
        ]);
        if ($cad) {
            return redirect('listarfuncionario/' . $request->id_filial);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!Session::has('login')) {return redirect('/');}
        $funcionario = $this->objFunc->find($id);
        return view('FuncionarioView/show', compact('funcionario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!Session::has('login')) {return redirect('/');}
        $funcionario = $this->objFunc->find($id);
        $filial = $this->filial;
        $password = $this->generatePassword();
        return view('FuncionarioView/create', compact('funcionario', 'filial', 'password'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FuncionarioRequest $request, $id)
    {
        if (!Session::has('login')) {return redirect('/');}

        $this->objFunc->where(['id' => $id])->update([
            'nome' => $request->nome,
            'data_nascimento' => formatDtBd($request->data_nascimento),
            'sexo' => $request->sexo,
            'cpf' => removeCaract($request->cpf),
            'endereco' => $request->endereco,
            'cargo' => $request->cargo,
            'salario' => removeMaskDinheiro($request->salario),
            'situacao' => $request->situacao,
            'password' => Hash::make($request->password),
            'id_filial' => $request->id_filial,
        ]);
        return redirect('listarfuncionario/'.$request->id_filial);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = $this->objFunc->destroy($id);
        return ($del) ? "sim" : "não";
    }

    /**
     * Gera uma senha aleatória, contendo letras, números e caracteres especiais
     *
     * @param integer $qtyCaraceters
     * @return void
     */
    public function generatePassword($qtyCaraceters = 6)
    {
        $smallLetters = str_shuffle('abcdefghijklmnopqrstuvwxyz');

        $capitalLetters = str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ');

        $numbers = (((date('Ymd') / 12) * 24) + mt_rand(800, 9999));
        $numbers .= 1234567890;

        $specialCharacters = str_shuffle('!@#$%*-');

        $characters = $capitalLetters . $smallLetters . $numbers . $specialCharacters;

        $password = substr(str_shuffle($characters), 0, $qtyCaraceters);

        return $password;
    }

    /**
     * Lista os funcionários pelo ID de sua filial
     *
     * @param integer $id
     * @return void
     */
    public function getFuncionario($id)
    {
        if (!Session::has('login')) {return redirect('/');}
        $funcionario = $this->objFunc->where('id_filial', $id)->get();
      
        $funcionario = $this->objFunc->paginate(5);
        $idFilial = $id;
        return view('FuncionarioView/index', compact('funcionario', 'idFilial'));
    }

    public function logout()
    {
        Session::flush();
        return redirect('/');
    }

    public function ApresentarLogin()
    {
        return view('login/login');
    }

    public function FazerLogin(LoginRequest $request)
    {
        $dados = FuncionarioModel::where('cpf', removeCaract($request->cpf))->first();
        
        if (!$dados) {
            $errors_bd = ['Essa Conta de Usuário não Existe!'];
            return redirect('/')->withErrors($errors_bd);
        } else if (!Hash::check($request->password, $dados->password)) {
            $errors_bd = ['Senha Incorreta'];
            return redirect('/')->withErrors($errors_bd);

        } else if (!($dados->situacao)) {
            $errors_bd = ['Funcionario Inativo'];
            return redirect('/')->withErrors($errors_bd);
        }

        Session::put('login', 'sim');
        Session::put('funcionario', $dados->nome);
        
        return redirect('filial');
    }
}
