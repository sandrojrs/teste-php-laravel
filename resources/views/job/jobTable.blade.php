<div>
    <h2>Fila</h2>
    <form action="/run-queue" method="get">
        @csrf
        <button class="btn btn-primary mb-2" type="submit" @if (empty($jobs)) disabled @endif>Executar
            Fila</button>
    </form>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Data de criação</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @isset($jobs)
                    @foreach ($jobs as $job)
                        <tr>
                            <td>{{ $job->id }}</td>
                            <td>{{ $job->created_at }}</td>
                            <td><span>Pendente</span></td>
                        </tr>
                    @endforeach
                @endisset
            </tbody>
        </table>
    </div>
</div>
