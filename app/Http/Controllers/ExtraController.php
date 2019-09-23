<?php

namespace App\Http\Controllers;

use App\Extra;
use Illuminate\Http\Request;
use Session;

class ExtraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('extra');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'origem' => 'required',
            'data'=>'required',
            'total'=>'required',
        ],[
            'origem.required' => 'O campo Origem é obrigatório!',
            'data.required' => 'O campo Data é obrigatório!',
            'total.required' => 'O campo Total é obrigatório!',
        ]);

        $date = str_replace('/', '-', $request['data'] );
        $newDate = date("Y-m-d", strtotime($date));

        $request['data'] = $newDate;

        $request['id_usuario'] = Session::get('user_id');


        extra::create($request->all());
        return redirect()->route('extra.create')
                        ->with('success','Dinheiro extra cadastrado com sucesso.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Extra $extra)
    {
        $extra = Extra::where('id_usuario', Session::get('user_id'))->get();

        return view('showextra')->with('extra', $extra);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
