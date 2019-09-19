<?php

namespace App\Http\Controllers;

use App\Dispesas;
use Illuminate\Http\Request;

class DispesasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        return view('dispesas/dispesas');
    }
 
    public function store(request $request) //Request Dispesas
    {
        $request->validate([
            'local' => 'required',
            'tipo' => 'required',
            'datap'=> 'required',
            'preco'=>'required',
        ],[
            'local.required' => 'O campo Local é obrigatório!',
            'tipo.required' => 'O campo Tipo é obrigatório!',
            'datap.required' => 'O campo Data é obrigatório!',
            'preco.required' => 'O campo Preço é obrigatório!',
        ]);
        Dispesas::create($request->all());
        return redirect()->route('dispesas.index')
                        ->with('success','Dispesa cadastrada com sucesso.');

   
    }
   
    public function show(Dispesas $dispesas)
    {
         $dispesas = Dispesas::all();

        return view('dispesas/showdisp')->with('dispesas', $dispesas);
    }

   
}
