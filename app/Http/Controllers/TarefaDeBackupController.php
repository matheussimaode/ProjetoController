<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TarefaDeBackup;

class TarefaDeBackupController extends Controller
{
    
    public function create()
    {
        return view('formTarefaBackup');
    }

    public function store(Request $request)
    {
        $dadosValidados = $request->validate([
            'origem' => 'required',
            'destino' => 'required',
            'cron' => 'required',
        ]);

        $tarefaDeBk = new TarefaDeBackup;
        $tarefaDeBk->origem = $dadosValidados['origem'];
        $tarefaDeBk->destino = $dadosValidados['destino'];
        $tarefaDeBk->cron = $dadosValidados['cron'];
        $tarefaDeBk->save();
        
        //$show = TarefaDeBackupController::create($dadosValidados);

        return redirect()->back()->with('success', 'Tarefa de Backup Sava com Sucesso');        
    }
}