<div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>

        {{-- Limpa a variável de sessão 'success' --}}
        @php
            session()->forget('success');
        @endphp
    @endif

    {{-- Exibir mensagem de erro --}}
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        {{-- Limpa a variável de sessão 'error' --}}
        @php
            session()->forget('error');
        @endphp
    @endif
</div>
