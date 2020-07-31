<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilialRequest;
use App\Models\FilialModel;
use App\Models\FuncionarioModel;
use Illuminate\Support\Facades\Hash;
use Session;

require_once 'includes/functions.php';
require_once 'includes/constantes.php';

class FilialController extends Controller
{
    private $objFunc;
    private $objFilial;

    public function __construct()
    {
        $this->objFunc = new FuncionarioModel();
        $this->objFilial = new FilialModel();
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
        $filial = $this->objFilial->paginate(10);
        return view('FilialView/index', compact('filial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        if (!Session::has('login')) {return redirect('/');}
        return view('FilialView/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FilialRequest $request)
    {
        $validaCnpj = FilialModel::where('cnpj', removeCaract($request->cnpj))->first();
        $validaNome = FilialModel::where('nome', $request->nome)->first();
        $validaRegEs = FilialModel::where('inscricao_estadual', removeCaract($request->inscricao_estadual))
        ->first();

        $valida = $this->mensagens($validaNome, $validaCnpj, $validaRegEs);
        if ($valida) {
            return view('FilialView/create')
                ->withErrors($valida);
        }

        $cad = $this->objFilial->create([
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'inscricao_estadual' => removeCaract($request->inscricao_estadual),
            'cnpj' => removeCaract($request->cnpj),
        ]);
        if ($cad) {
            return redirect('filial');
        }
    }

    public function mensagens($validaNome, $validaCnpj, $validaRegEs)
    {
        if ($validaNome) {
            $valida = [MSG01];
        } else if ($validaCnpj) {
            $valida = [MSG02];
        } else if ($validaRegEs) {
            $valida = [MSG03];
        }

        return isset($valida) ? $valida : "";
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
        $filial = $this->objFilial->find($id);
        return view('FilialView/show', compact('filial'));
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
        $filial = $this->objFilial->find($id);
        return view('FilialView/create', compact('filial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FilialRequest $request, $id)
    {
        if (!Session::has('login')) {return redirect('/');}
        $validaCnpj = FilialModel::where('cnpj', removeCaract($request->cnpj))->where("id", "<>", $id);
        $validaNome = FilialModel::where('nome', $request->nome)->where("id", "<>", $id);
        $validaRegEs = FilialModel::where('inscricao_estadual', removeCaract($request->inscricao_estadual))
        ->where("id", "<>", $id);

        $valida = $this->mensagens($validaNome, $validaCnpj, $validaRegEs);

        if ($valida) {
            $filial = $request;
            return view('FilialView/create', compact('filial'))
                ->withErrors($valida);
        }

        $this->objFilial->where(['id' => $id])->update([
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'inscricao_estadual' => removeCaract($request->inscricao_estadual),
            'cnpj' => removeCaract($request->cnpj),
        ]);
        return redirect('filial');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = $this->objFilial->destroy($id);
        return ($del) ? "sim" : "não";
    }
}
