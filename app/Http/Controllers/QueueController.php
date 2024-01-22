<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class QueueController extends Controller
{
    public function runQueue()
    {
        $exitCode = Artisan::call('queue:work', ['--queue' => 'import_queue_document', '--stop-when-empty' => true]);

        if ($exitCode === 0) {
            return redirect()->route('import.form')->with('success', 'A fila foi processada com sucesso.');
        } else {
            return redirect()->route('import.form')->with('error', 'Ocorreu um erro ao processar a fila.');
        }
    }
}