<?php

namespace App\Http\Controllers;
Use Session;
use App\Http\Requests\AutomovelRequest;
use App\Models\AutomovelModel;
use App\Models\CategoriaAutomovelModel;
use Illuminate\Support\Facades\Hash;
use App\Models\FilialModel;

require_once 'includes/constantes.php';

class AutomovelController extends Controller
{
    private $objAutomovel;
    private $objFilial;
    private $objCategoria;

    public function __construct()
    {
        $this->objFilial = new FilialModel();
        $this->objAutomovel = new AutomovelModel();
        $this->objCategoria = new CategoriaAutomovelModel();
        $this->filial = $this->objFilial->all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Session::has('login')){return redirect('/');}
        
        $automovel = $this->objAutomovel->all();
        return view('AutomovelView/index', compact('automovel'));
    }

    public function create()
    {
        if(!Session::has('login')){return redirect('/');}
        $filial = $this->objFilial->all();
        $categoria = $this->objCategoria->all();
        return view('AutomovelView/create', compact('filial', 'categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AutomovelRequest $request)
    {
        $validaChassi = AutomovelModel::where('n_chassi', $request->n_chassi)->first();
        if ($validaChassi) {
            $filial = $this->filial;
            $valida = [MSG05];
            return view('AutomovelView/create', compact('filial'))
            ->withErrors($valida);
        }

        $cad = $this->objAutomovel->create([
            'id_filial' => $request->id_filial,
            'nome' => $request->nome,
            'ano' => $request->ano,
            'modelo' => $request->modelo,
            'cor' => $request->cor,
            'n_chassi' => $request->n_chassi,
            'id_categoria_automovel' => $request->id_categoria_automovel
        ]);
        if ($cad) {
            return redirect('automovel');
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
        if(!Session::has('login')){return redirect('/');}
        $automovel = $this->objAutomovel->find($id);
        return view('AutomovelView/show', compact('automovel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Session::has('login')){return redirect('/');}
        $categoria = $this->objCategoria->all();
        $automovel = $this->objAutomovel->find($id);
        $filial = $this->objFilial->all();
        return view('AutomovelView/create', compact('automovel', 'categoria', 'filial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AutomovelRequest $request, $id)
    {
        if(!Session::has('login')){return redirect('/');}
        $this->objAutomovel->where(['id' => $id])->update([
            'id_filial' => $request->id_filial,
            'nome' => $request->nome,
            'ano' => $request->ano,
            'modelo' => $request->modelo,
            'cor' => $request->cor,
            'n_chassi' => $request->n_chassi,
            'id_categoria_automovel' => $request->id_categoria_automovel,
        ]);
        return redirect('listarautomovel/'.$request->id_filial);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = $this->objAutomovel->destroy($id);
        return ($del) ? "sim" : "não";
    }

    /**
     * Lista os automoveis pelo ID de sua filial
     *
     * @param integer $id
     * @return void
     */
    public function getAutomovel($id)
    {
        if(!Session::has('login')){return redirect('/');}
        $automovel = $this->objAutomovel->where('id_filial', $id)->get();
        $automovel = $this->objAutomovel->paginate(10);
        return view('AutomovelView/index', compact('automovel'));
    }
}
