<?php

namespace App\Http\Controllers;

use App\Dispesas;
use Illuminate\Http\Request;
use Session;

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


        $date = str_replace('/', '-', $request['datap'] );
        $newDate = date("Y-m-d", strtotime($date));

        $request['datap'] = $newDate;

        $request['id_usuario'] = Session::get('user_id');

        Dispesas::create($request->all());
        return redirect()->route('dispesas.index')
                        ->with('success','Dispesa cadastrada com sucesso.');

   
    }
   
    public function show(Dispesas $dispesas)
    {
         $dispesas = Dispesas::where('id_usuario', Session::get('user_id'))->get();

        return view('dispesas/showdisp')->with('dispesas', $dispesas);
    }

   
}
