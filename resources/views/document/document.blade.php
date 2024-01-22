@extends('layouts.app')
@section('content')
 <div>
     <h2>Documentos</h2>
     <div class="table-responsive">
         <table class="table table-striped table-bordered">
             <thead>
                 <tr>
                     <th>ID</th>
                     <th>Categoria</th>
                     <th>Titulo</th>
                     <th>Conteúdo</th>
                 </tr>
             </thead>
             <tbody>
                 @isset($documents)
                     @foreach ($documents as $document)
                         <tr>
                             <td>{{ $document->id }}</td>
                             <td>{{ $document->category->name }}</td>
                             <td>{{ $document->title }}</td>
                             <td>{{ $document->contents }}</td>
                         </tr>
                     @endforeach
                 @endisset
             </tbody>
         </table>
     </div>
 </div>
 @endsection

