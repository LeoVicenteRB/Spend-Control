<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contas;
use App\Dispesas;





class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        $contas = Contas::where('id_usuario', $session);

        $dispMes = $this->CalcDispesas();
        $conMes = $this->CalcContas();
        $totalContas = $this->totalContas();
        $totalDispesas = $this->totalDispesas();
        $Vencimento = $this->Vencimento($request);

        return view('index')->with(compact('contas', 'dispMes','conMes', 'totalContas','totalDispesas','Vencimento'));

    }

    private function CalcDispesas()
    {
        $meses = ['Jan' => '01', 'Fev'=> '02', 'Mar' => '03','Abr'=>'04','Mai'=>'05','Jun'=>'06', 'Jul'=>'07','Ago'=>'08','Set'=>'09','Out'=>'10','Nov'=>'11','Dez'=>'12' ];

        $dispesas = array();
        foreach ($meses as $k => $mes) {
            $dispesas[$k] = Dispesas::whereBetween('created_at', ["2019-$mes-01 00:00:00", "2019-$mes-31 23:59:59"])->get()->toArray();
            if (count($dispesas[$k]) == 0) {
                $dispesas[$k][] = 0;
            }
        }


        $calc = array();
        foreach ($dispesas as $key => $disp) {
            foreach ($disp as $index => $value) {
                $calc[$key][$index] = $value['preco'];
            }            
        }

        $calcDispesas = array();
        foreach($calc as $dis => $vlr) {
            $quant = count($vlr);
            $soma = array_sum($vlr);

            $media = $soma / $quant;

            $calcDispesas[$dis] = $media;
        }

        return $calcDispesas;
    }

     private function CalcContas()
    {
        $meses = ['Jan' => '01', 'Fev'=> '02', 'Mar' => '03','Abr'=>'04','Mai'=>'05','Jun'=>'06', 'Jul'=>'07','Ago'=>'08','Set'=>'09','Out'=>'10','Nov'=>'11','Dez'=>'12' ];

        $contas = array();
        foreach ($meses as $k => $mes) {
            $contas[$k] = Contas::whereBetween('created_at', ["2019-$mes-01 00:00:00", "2019-$mes-31 23:59:59"])->get()->toArray();
            if (count($contas[$k]) == 0) {
                $contas[$k][] = 0;
            }
        }



        $calc = array();
        foreach ($contas as $key => $con) {
            foreach ($con as $index => $value) {
                $calc[$key][$index] = $value['preco'];
            }            
        }

        $calcContas = array();
        foreach($calc as $con => $vlr) {
            $quant = count($vlr);
            $soma = array_sum($vlr);

            $media = $soma / $quant;

            $calcContas[$con] = $media;
        }

        return $calcContas;
    }
    private function totalContas()
    {   
        $calc = array();
        $contas = Contas::all()->toArray();
        foreach ($contas as $k => $cont) {
            $calc[$k] = $cont['preco'];
        } 

        $totalContas = array_sum($calc);

        return $totalContas;
    }

    private function totalDispesas()
    {   
        $calc = array();
        $dispesas = Dispesas::all()->toArray();
        foreach ($dispesas as $k => $disp) {
            $calc[$k] = $disp['preco'];
        } 

        $totalDispesas = array_sum($calc);

        return $totalDispesas;
    }
    private function Vencimento(Request $request)
    {
        $mes = date('m')-1;
        // $mes_inicial = $request->get('mes_inicial', 1);
        // $mes_final = $request->get('mes_final', 12);

        // $range = range($mes_inicial, $mes_final);

        $meses = ['Jan' => '01', 'Fev'=> '02', 'Mar' => '03','Abr'=>'04','Mai'=>'05','Jun'=>'06', 'Jul'=>'07','Ago'=>'08','Set'=>'09','Out'=>'10','Nov'=>'11','Dez'=>'12' ];

        $contas = array();

        $contas = Contas::whereBetween('created_at', ["2019-$mes-01 00:00:00", "2019-$mes-31 23:59:59"])->get()->toArray();

        return $contas;
    }
   
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contas $contas)
    {
        
         $contas = Contas::all();

        return view('showcontas')->with('contas', $contas);
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
          $contas = \App\Home::find($id);
          $contas->delete();
        return redirect()->route('index')
                        ->with('success','Conta apaga com sucesso');
    }
}
