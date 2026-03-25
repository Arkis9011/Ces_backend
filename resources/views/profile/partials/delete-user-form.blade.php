<section>
    <div class="mb-4">
        <h4 class="fw-bold mb-1" style="color:#dc3545">{{ __('Suppression du compte') }}</h4>
        <p class="text-muted small">
            {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées.') }}
        </p>
    </div>

    <button type="button" class="btn btn-danger fw-bold px-4" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
        {{ __('Supprimer le compte') }}
    </button>

    <!-- Modal de confirmation -->
    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content shadow border-0">
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title fw-bold" id="confirmUserDeletionModalLabel">{{ __('Êtes-vous sûr de vouloir supprimer votre compte ?') }}</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body p-4">
                        <p class="text-muted small">
                            {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées. Veuillez saisir votre mot de passe pour confirmer que vous souhaitez supprimer définitivement votre compte.') }}
                        </p>

                        <div class="mt-3">
                            <label for="password_del" class="form-label fw-semibold sr-only">{{ __('Mot de passe') }}</label>
                            <input id="password_del" name="password" type="password" class="form-control @error('password', 'userDeletion') is-invalid @enderror" placeholder="{{ __('Mot de passe de confirmation') }}" required />
                            @error('password', 'userDeletion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary px-4 fw-bold" data-bs-dismiss="modal">
                            {{ __('Annuler') }}
                        </button>
                        <button type="submit" class="btn btn-danger px-4 fw-bold">
                            {{ __('Supprimer définitivement') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
