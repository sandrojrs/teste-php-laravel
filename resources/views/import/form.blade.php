@extends('layouts.app')
@section('content')
    <div>
        <h2>Importação de Documentos</h2>
        <form action="{{ url('/import') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="json_file" class="form-label">Selecione o Arquivo JSON:</label>
                <input type="file" class="form-control" id="json_file" name="json_file" accept=".json" required>
            </div>
            <button type="submit" class="btn btn-primary">Importar Documentos</button>
        </form>
        <hr>
    </div>
    @include('job.jobTable')
@endsection
