@include('includes.header')

<div class="container-fluid main-content">
    <div class="row">
        @include('admin.includes.menu')

        <div class="col-md-9">
            @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
            @endif
            
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <h2>Formulário de Cadastro de Cliente</h2>

            <form action="{{ route('clientes.store') }}" method="POST">
                @csrf

                @include('admin.clientes._form')

            </form>
        </div>
    </div>
</div>
@include('includes.footer')
