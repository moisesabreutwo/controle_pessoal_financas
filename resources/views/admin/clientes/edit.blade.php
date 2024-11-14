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
            <h2>Editar Cliente</h2>

            <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
                @csrf
                @method('PUT')

                @include('admin.clientes._form', ['cliente' => $cliente])

            </form>
        </div>
    </div>
</div>
@include('includes.footer')
