<section>
    <!-- Cabeçalho da Seção -->
    <header class="mb-4">
        <h2 class="h4 text-dark">
            {{ __('Excluir Conta') }}
        </h2>

        <p class="text-muted">
            {{ __('Uma vez que sua conta for excluída, todos os seus dados e recursos serão permanentemente apagados. Antes de excluir sua conta, por favor, faça o download de qualquer dado ou informação que você deseje reter.') }}
        </p>
    </header>

    <!-- Botão de Ação para Excluir Conta -->
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
        {{ __('Excluir Conta') }}
    </button>

    <!-- Modal de Confirmação para Exclusão de Conta -->
    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmUserDeletionModalLabel">{{ __('Tem certeza que deseja excluir sua conta?') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <p class="text-muted">
                            {{ __('Uma vez que sua conta for excluída, todos os seus dados e recursos serão permanentemente apagados. Por favor, insira sua senha para confirmar a exclusão definitiva da conta.') }}
                        </p>

                        <!-- Campo de Senha -->
                        <div class="form-group mt-3">
                            <label for="password" class="form-label">{{ __('Senha') }}</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="{{ __('Senha') }}">
                            @if ($errors->userDeletion->has('password'))
                                <div class="alert alert-danger mt-2">{{ $errors->userDeletion->first('password') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancelar') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Excluir Conta') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
