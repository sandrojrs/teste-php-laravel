<?php

namespace Tests\Feature;

use App\Http\Controllers\DocumentController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DocumentTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_validates_content_max_length()
    {
        $data = [
            'conteúdo' => str_repeat('a', 256), // Conteúdo com mais de 255 caracteres
            'categoria' => 'Remessa',
            'titulo' => 'Exemplo de título',
        ];

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Erro de validação: O conteúdo deve ter no máximo 255 caracteres.');

        (new DocumentController())->validationDocumentContentMaxLength($data);
    }

    /** @test */
    public function it_validates_title_for_remessa_with_semester()
    {
        $data = [
            'conteudo' => 'Exemplo de conteúdo',
            'categoria' => 'Remessa',
            'titulo' => 'Exemplo de título',
        ];

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Erro de validação: O título: exemplo de título deve conter a palavra "semestre"');

        (new DocumentController())->validateDocument($data);
    }

    /** @test */
    public function it_validates_title_for_remessa_parcial_with_month()
    {
        $data = [
            'conteudo' => 'Exemplo de conteúdo',
            'categoria' => 'Remessa Parcial',
            'titulo' => 'Exemplo de título sem mês',
        ];

        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Erro de validação: O título: exemplo de título sem mês deve conter o nome de um mês');

        (new DocumentController())->validateDocument($data);
    }
}
