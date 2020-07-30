<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilialRequest;
use App\Models\FilialModel;
use App\Models\FuncionarioModel;
use Session;

require_once 'includes/functions.php';

class FilialController extends Controller
{
    private $objFunc;
    private $objFilial;

    public function __construct()
    {
        $this->objFunc = new FuncionarioModel();
        $this->objFilial = new FilialModel();

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
        $filial = $this->objFilial->all();
        return view('FilialView/index', compact('filial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        // $validaCnpj= FilialModel::where('cnpj', removeCaract($request->cnpj))->first();
        // $validaNome= FilialModel::where('nome', removeCaract($request->nome))->first();
        // $validaRegEs = FilialModel::where('inscricao_estadual', removeCaract($request->inscricao_estadual))
        //->first();
        //
        //if($validaNome){
        //     $valida = ['Esse'];
        //} else if ($validaCnpj) {
        //     $valida = ['Esse'];
        // }else if ($validaRegEs){
        //     $valida = ['Esse'];
        // }
        //isset($valida) ? return $valida : '';

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        // $validaCnpj= FilialModel::where('cnpj', removeCaract($request->cnpj))
        //->andWhere("id", "<>", $id);
        //$validaNome= FilialModel::where('nome', removeCaract($request->nome))->
        //-->andWhere("id", "<>", $id);
        // $validaRegEs = FilialModel::where('inscricao_estadual', removeCaract($request->inscricao_estadual))
        //-->andWhere("id", "<>", $id);
        //if($validaNome){
        //     $valida = ['Esse'];
        //} else if($validaCnpj) {
        //     $valida = ['Esse'];
        // }else if ($validaRegEs){
        //     $valida = ['Esse'];
        // }
        //isset($valida) ? return $valida : '';
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
        //$filiais = $this->objFunc->where('id_filial',$id);
        //$del = $this->objFunc-->destroy($id);
        $del = $this->objFilial->destroy($id);
        dd($del);
        return ($del) ? "sim" : "não";
    }
}
