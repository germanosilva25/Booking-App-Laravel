<?php
/*
O namespace serve para indicar para o laravel
o caminho desse arquivo. Assim como você precisa
incluir funcionalidades de outro arquivos em um
arquivo atual, usando a função include, no Laravel 
esse import é feito usando a função use.
*/
namespace App\Http\Controllers;
/*
O uso dessa função use é para poder utilizar ass funcionalidades
do arquivo na página atual. Dessa forma, é necessário indicar o namespace
e por último indicar o nome da classe
*/

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends BaseController
{

    public function index()
    {
        return "Hello world from UserController::classs - método index";
    }

    public function atualizarUsuario(Request $request)
    {
        $user = User::find($request->id_usuario);
        $usuarioCriado = User::find($request->id_usuario)
            ->update([
            'nome' => isset($request->nome) ? $request->nome : $user->nome,
            'email' => isset($request->email) ? $request->email : $user->email,
            'id_grupo' => isset($request->id_grupo) ? $request->id_grupo : $user->id_grupo,
            'data_de_nascimento' => isset($request->data_de_nascimento) ? $request->data_de_nascimento : $user->data_de_nascimento,
            'senha' => isset($request->senha) ? $request->senha : $user->senha,
        ]);

        return response()->json(User::all());
    }
    
    public function createUsuario(Request $request)
    {
        // dd($request->all());
        $usuarioCriado = User::create([
            'nome_usuario' => $request->nome,
            'email' => $request->email,
            'id_grupo' => $request->id_grupo,
            'data_de_nascimento' => Carbon::parse($request->data_de_nascimento)->format('Y-m-d'),
            'senha' => Hash::make($request->senha),
        ]);

        // return response()->json($request->all());
        if($usuarioCriado)
            return response()->json(true);

        return response()->json($usuarioCriado);
    }

    

    // localhost/agendamentos/create-usuario?name=Jonas+Bueno&email=elizabetecordeiro@mail.com&id_grupo=3&data_nascimento=2000-05-01&senha=kmlkmKMKLm9890NNMO

    public function getusuarios(){

        $usuarios = User::all();
        $usuarios2 = User::join('grupos', 'grupos.id_grupo', 'usuarios.id_grupo')->get();
        return response()->json(['usuarios' => $usuarios2]);
    }

    public function getProfissional(){

        $usuarios = User::all();
        $usuarios2 = User::join('grupos', 'grupos.id_grupo', 'usuarios.id_grupo')
        ->where('usuarios.id_grupo', 2)
        ->get();
        return response()->json(['usuarios' => $usuarios2]);
    }

    public function getCliente(){

        $usuarios = User::all();
        $usuarios2 = User::join('grupos', 'grupos.id_grupo', 'usuarios.id_grupo')
        ->where('usuarios.id_grupo', 3)
        ->get();
        return response()->json(['usuarios' => $usuarios2]);
    }

    public function deletarUsuario(Request $request){
        $usuario = User::find($request->id_usuario)->delete();
    }

}


