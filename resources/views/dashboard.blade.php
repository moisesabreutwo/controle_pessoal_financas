@include('includes.header')

<!-- Conteúdo Principal -->
<div class="container main-content py-5">
    <h2 class="h4 text-dark">
        {{ __('Admin Dashboard') }}
    </h2>

    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body text-center text-muted">
                    {{ __("Você está logado!") }}
                </div>
            </div>
        </div>
    </div>


@include('includes.footer')
