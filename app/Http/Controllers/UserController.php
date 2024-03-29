<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Session;

class UserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(request $request) //Request Dispesas
    {
        $data = $request->all();
        $request->validate([
            'name' => 'required',
            'cpf' => 'required|unique:users',
            'email'=> 'required|unique:users',
            'salario'=>'required',
            'password'=>'required|min:8|max:20',
            'passwordsame'=>'required|same:password|min:8|max:20',
        ],[
            'name.required' => 'O campo Nome é obrigatório!',
            'cpf.required' => 'O campo CPF é obrigatório!',
            'cpf.unique' => 'Este CPF já está cadastrado!',
            'email.required' => 'O campo Email é obrigatório!',
            'email.unique' => 'Este E-mail já está cadastrado!',
            'salario.required' => 'O campo Salário é obrigatório!',
            'password.required' => 'O campo Senha é obrigatório!',
            'password.min' => 'O campo Senha precisa ter no minimo 8 caracteres!',
            'password.max' => 'O campo Senha só pode ter até 20 caracteres!',
            'passwordsame.min' => 'O campo Confirme precisa ter no minimo 8 caracteres!',
            'passwordsame.max' => 'O campo Confirme só pode ter até 20 caracteres!',
            'passwordsame.required' => 'O campo Senha é obrigatório!',
            'passwordsame.same' => 'O campo Senha e Confirme precisam ser iguais!',

        ]);
         $source = array('.', ',');
        $replace = array('', '.');

        $data['salario'] = str_replace($source, $replace, $data['salario']);
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'salario' => $data['salario'],
            'cpf' => $data['cpf'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('home.index')
                        ->with('success','Usuário cadastrado com sucesso.');

   
    }
    public function Edit()
    {
        $user = User::where('id', Session::get('user_id'))->first()->toArray();

        $source = array('.', ',');
        $replace = array('', '.');

        $user['salario'] = number_format($user['salario'], 2);

        return view('edit.edit',compact('user'));

    }

    public function Update(Request $request)
    {   
        $id = Session::get('user_id');
        $input = $request->all();
        $user = User::findOrFail($id);

        $request->validate([
                'name' => 'required',
                'cpf' => 'required',
                'email'=>'required',
                'salario'=>'required',
            ],[
                'name.required' => 'O campo Nome é obrigatório!',
                'cpf.required' => 'O campo CPF é obrigatório!',
                'email.required' => 'O campo Email é obrigatório!',
                'salario.required' => 'O campo Salário é obrigatório!',
            ]
        );

        $source = array('.', ',');
        $replace = array('', '.');

        $input['salario'] = str_replace($source, $replace, $input['salario']);

        $user->fill($input);
        $user->save();
        return redirect()->route('user.edit')
                        ->with('success','Perfil editado com sucesso.');
    }
    
}
