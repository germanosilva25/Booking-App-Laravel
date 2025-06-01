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
use App\Models\Agenda;

class AgendaController extends BaseController
{

    public function getAgenda(){
        return response()->json([
            'agendas' => Agenda::with('usuario')->get()
        ]);
    }
    public function criarAgenda(Request $request)
    {
        $inicio = strtotime($request->horario_inicio);
        $final = strtotime($request->horario_final);
        $intervalo = ($final - $inicio) / 60; 
        $qnt = $intervalo/30;
        $agendas = [];
        for($i=0; $i<$qnt; $i++){
            //echo "<br>" .date("H:i", $inicio);
            $agendas[]=Agenda::create([
                'horario' => date("H:i", $inicio),
                'id_usuario' => $request->id_usuario,
                'dia_da_semana' => $request->dia_da_semana,
            ]);
            $inicio += 1800;


        }
        return response()->json($agendas);

    }
}
