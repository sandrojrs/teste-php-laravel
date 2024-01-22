<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Jobs\ProcessImport;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();
        return view('document.document', compact('documents'));
    }

    public function importIndex()
    {
        $jobs = Job::all();
        return view('import.form', compact('jobs'));
    }

    public function importDocuments(Request $request)
    {
        try {
            $jsonFile = $request->file('json_file');
            $jsonContent = json_decode(file_get_contents($jsonFile), true);

            if ($jsonContent === null && json_last_error() !== JSON_ERROR_NONE) {
                throw new \RuntimeException('Erro ao decodificar o arquivo JSON: ' . json_last_error_msg());
            }

            foreach ($jsonContent['documentos'] as $documentData) {
                $this->validateDocument($documentData);
                ProcessImport::dispatch($documentData)->onQueue('import_queue_document');
            }

            session()->put('success', 'Operação realizada com sucesso.');
            $jobs = Job::all();
            return view('import.form', compact('jobs'));
        } catch (\Throwable $th) {
            $errorMessage = $th->getMessage();
            session()->flash('error', $errorMessage);
            return view('import.form');
        }
    }

    public function validationDocumentContentMaxLength($documentData){
        $validationRules = [
            'conteúdo' => 'max:255',
        ];

        $validationMessages = [
            'conteúdo.max' => 'Erro de validação: O conteúdo deve ter no máximo 255 caracteres.',
        ];

        $validator = \Validator::make($documentData, $validationRules, $validationMessages);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }
    }

    public function validateDocument($documentData)
    {
        $this->validationDocumentContentMaxLength($documentData);

        $title = strtolower($documentData['titulo']);
        $category = $documentData['categoria'];

        if ($category === 'Remessa' && !str_contains($title, 'semestre')) {
            throw new \Exception('Erro de validação: O título: ' . $title . ' deve conter a palavra "semestre"');
        } elseif ($category === 'Remessa Parcial' && !$this->containsMonth($title)) {
            throw new \Exception('Erro de validação: O título: ' . $title . ' deve conter o nome de um mês');
        }
    }

    private function containsMonth($title)
    {
        $months = ['janeiro', 'fevereiro', 'março', 'abril', 'maio', 'junho', 'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro'];

        foreach ($months as $month) {
            // Verifica se o nome do mês está presente na string (ignorando maiúsculas/minúsculas)
            if (stripos($title, $month) !== false) {
                return true;
            }
        }
    }
}
