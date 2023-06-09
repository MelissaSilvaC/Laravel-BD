<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamentos;

class AgendamentosController extends Controller
{
    //Inserir dados
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|max:100',
            'telefone' => 'required|max:20',
            'origem' => 'required|max:30',
            'data_contato' => 'required|max:10',
            'observacao' => 'required|max:255',
        ]);

        $agendamento = new Agendamentos();
        $agendamento->nome = $request->nome;
        $agendamento->telefone = $request->telefone;
        $agendamento->origem = $request->origem;
        $agendamento->data_contato = $request->data_contato;
        $agendamento->observacao = $request->observacao;
        $agendamento->save();

        return redirect()->route('index');
    }

    //Mostrar dados
    public function show(){
        $tblAgendamentos = Agendamentos::all();
        return view('consulta', ['agendamentos' => $tblAgendamentos]);
    }
}
