@include('includes.header')
    <!-- Conteúdo Principal -->
    <div class="container main-content">
        <h2>Quero ser cliente</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('cliente.store') }}" method="POST">
            @csrf

            @include('admin.clientes._form')

        </form>

@include('includes.footer')
