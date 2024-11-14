@include('includes.header')

<!-- Conteúdo Principal -->
<div class="container main-content py-5">
    <h2 class="font-weight-bold text-center mb-4">{{ __('Perfil') }}</h2>

    <div class="row justify-content-center">
        <div class="col-md-8">

            <!-- Formulário de Atualização de Informações de Perfil -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    {{ __('Atualizar Informações do Perfil') }}
                </div>
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Formulário de Alteração de Senha -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    {{ __('Atualizar Senha') }}
                </div>
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Formulário de Exclusão de Usuário -->
            <div class="card mb-4">
                <div class="card-header bg-danger text-white">
                    {{ __('Excluir Conta') }}
                </div>
                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>

        </div>
    </div>
</div>

@include('includes.footer')
