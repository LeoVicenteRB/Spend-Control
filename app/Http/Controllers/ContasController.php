<?php
  
namespace App\Http\Controllers;
  
use App\Contas;
use Illuminate\Http\Request;
use Session;

  
class ContasController extends Controller
{
    public function create()
    {
        return view('cadastro');
    }
   
    public function store(request $request) //Request Cadastro
    {
        $request->validate([
            'local' => 'required',
            'tipo' => 'required',
            'data'=>'required',
            'preco'=>'required',
        ],[
            'local.required' => 'O campo Local é obrigatório!',
            'tipo.required' => 'O campo Tipo é obrigatório!',
            'data.required' => 'O campo Data é obrigatório!',
            'preco.required' => 'O campo Preço é obrigatório!',
        ]);

        $date = str_replace('/', '-', $request['data'] );
        $newDate = date("Y-m-d", strtotime($date));

        $request['data'] = $newDate;

        $request['id_usuario'] = Session::get('user_id');


        Contas::create($request->all());
        return redirect()->route('conta.create')
                        ->with('success','Conta cadastrada com sucesso.');

   
    }
  public function edit($id)
    {          

        $conta = Contas::where('id', $id)->first();
        return view('editc', compact('conta'));

    }
   public function update(Request $request, $id)
   {
     $request->validate([
            'local' => 'required',
            'tipo' => 'required',
            'data'=>'required',
            'preco'=>'required',
        ],[
            'local.required' => 'O campo Local é obrigatório!',
            'tipo.required' => 'O campo Tipo é obrigatório!',
            'data.required' => 'O campo Data é obrigatório!',
            'preco.required' => 'O campo Preço é obrigatório!',
        ]
    );
     
        $date = str_replace('/', '-', $request['data'] );
        $newDate = date("Y-m-d", strtotime($date));

        $request['data'] = $newDate;

    $contas = Contas::find($id);

    $dados = $request->all();


        $contas->update($dados);
        return redirect()->route('conta.editc',[$id])
                        ->with('success','Conta editada com sucesso.');
   }

    public function destroy($id)
    {

        Contas::where('id',$id)->delete();
        return redirect()->route('dashboard.show')
                        ->with('success','Conta deletada com sucesso.');
    }
}

