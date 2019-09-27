<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contas;
use App\Dispesas;
use App\Extra;
use App\User;
use Session;



class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Request $request)
    {
        
        $dispMes = $this->CalcDispesas();
        $conMes = $this->CalcContas();
        $totalContas = $this->totalContas();
        $totalDispesas = $this->totalDispesas();
        $Vencimentos = $this->Vencimento($request);
        $Resto = $this->Resto();

        return view('index')->with(compact('dispMes','conMes', 'totalContas','totalDispesas','Vencimentos','Resto'));

    }

    private function CalcDispesas()
    {
        $meses = ['Jan' => '01', 'Fev'=> '02', 'Mar' => '03','Abr'=>'04','Mai'=>'05','Jun'=>'06', 'Jul'=>'07','Ago'=>'08','Set'=>'09','Out'=>'10','Nov'=>'11','Dez'=>'12' ];

        $dispesas = array();
        foreach ($meses as $k => $mes) {
            $dispesas[$k] = Dispesas::whereBetween('created_at', ["2019-$mes-01 00:00:00", "2019-$mes-31 23:59:59"])->where('id_usuario', Session::get('user_id'))->get()->toArray();
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
            $contas[$k] = Contas::whereBetween('created_at', ["2019-$mes-01 00:00:00", "2019-$mes-31 23:59:59"])->where('id_usuario', Session::get('user_id'))->get()->toArray();
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
        $contas = Contas::where('id_usuario', Session::get('user_id'))->get();
        foreach ($contas as $k => $cont) {
            $calc[$k] = $cont['preco'];
        } 
        $totalContas = array_sum($calc);
        $totalContas =number_format($totalContas,2,",",".");


        return $totalContas;
    }

    private function totalDispesas()
    {   

        $calc = array();
        $dispesas = Dispesas::where('id_usuario', Session::get('user_id'))->get();
        foreach ($dispesas as $k => $disp) {
            $calc[$k] = $disp['preco'];
        } 
        $totalDispesas = array_sum($calc);
        $totalDispesas =number_format($totalDispesas,2,",",".");
        return $totalDispesas;
    }
    private function Vencimento(Request $request)
    {
        $dataAtual = date('Y-m-d');
        $mes = date('m');
        $contas = array();
        $meses = ['Jan' => '01', 'Fev'=> '02', 'Mar' => '03','Abr'=>'04','Mai'=>'05','Jun'=>'06', 'Jul'=>'07','Ago'=>'08','Set'=>'09','Out'=>'10','Nov'=>'11','Dez'=>'12' ];


        $contas = Contas::whereBetween('data', [$dataAtual, "2019-$mes-31"])->where('id_usuario', Session::get('user_id'))->get()->toArray();

        return $contas;
    }

    private function resto()
    {
        $dataAtual = date('Y-m-d');
        $mes = date('m');
        $meses = ['Jan' => '01', 'Fev'=> '02', 'Mar' => '03','Abr'=>'04','Mai'=>'05','Jun'=>'06', 'Jul'=>'07','Ago'=>'08','Set'=>'09','Out'=>'10','Nov'=>'11','Dez'=>'12' ];

        $salario_user = User::select('salario')->where('id', Session::get('user_id'))->first();
        $totalExtra = array();
        $extra=Extra::whereBetween('data', [$mes, "2019-$mes-31"])->where('id_usuario', Session::get('user_id'))->get()->toArray();
        foreach ($extra as $key => $ex) {
            $totalExtra[$key] = $ex['total'];
        }

        $totalExtra= array_sum($totalExtra);   
        $totalSal = $salario_user->salario + $totalExtra;

        $calc = array();
        $contas = Contas::whereBetween('data', [$mes, "2019-$mes-31"])->where('id_usuario', Session::get('user_id'))->get();
        foreach ($contas as $k => $cont) {
            $calc[$k] = $cont['preco'];
        } 

        $totalContas = array_sum($calc);

             $calc = array();
        $dispesas = Dispesas::whereBetween('datap', [$mes, "2019-$mes-31"])->where('id_usuario', Session::get('user_id'))->get();
        foreach ($dispesas as $k => $disp) {
            $calc[$k] = $disp['preco'];
        } 

        $totalDispesas = array_sum($calc);

        $totalgasto = $totalContas+$totalDispesas;

            $resto = $totalSal - $totalgasto;
            $resto =number_format($resto,2,",",".");
            return $resto; 
        }

    public function show(Contas $contas)
    {
        
        $contas = Contas::where('id_usuario', Session::get('user_id'))->get();

        return view('showcontas')->with('contas', $contas);
    }
    
    public function destroy($id)
    {
          $contas = \App\Home::find($id);
          $contas->delete();
        return redirect()->route('index')
                        ->with('success','Conta apaga com sucesso');
    }
}
