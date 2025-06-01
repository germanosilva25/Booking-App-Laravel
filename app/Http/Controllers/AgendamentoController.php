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
use App\Models\Agendamento;
use App\Models\Agenda;

class AgendamentoController extends BaseController
{

    public function getAgendamento(Request $request)
    {
        $agendamentos = Agendamento::with([
            'usuario',
            'agenda.usuario',
            'servico'
        ])->get();
        

        return response()->json([
            'agendamentos' => $agendamentos,
        ]);

    }

    public function prepararAgendamento(Request $request){

        $dia_da_semana = date('w', strtotime($request->data));

        $agendasDisponiveis = Agenda::where('dia_da_semana', $dia_da_semana)
        ->whereDoesntHave('agendamentos')
        ->with('usuario')
        ->get();

        return response()->json([
            'agendamentos' => $agendasDisponiveis
        ]);
    
        dd($agendasDisponiveis);

    }

    public function criarAgendamento(Request $request){
        Agendamento::create([
            'id_usuario' => $request->id_usuario,
            'id_servico' => $request->id_servico,
            'id_agenda' => $request->id_agenda,
            'data' => $request->data,
        ]);
        
        return response()->json(true);
    }
}
