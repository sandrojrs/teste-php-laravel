<?php

namespace App\Jobs;

use App\Models\Category;
use App\Models\Document;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessImport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $documento;

    public function __construct(array $documento)
    {
        $this->documento = $documento;
    }

    public function handle()
    {
        $category = Category::firstOrCreate([
            'name' => $this->documento['categoria'],
        ]);

        $document = [
            'category_id' => $category->id,
            'title' => $this->documento['titulo'],
            'contents' => $this->documento['conteúdo'],
        ];

        Document::create($document);
    }
}