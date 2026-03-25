<section>
    <div class="mb-4">
        <h4 class="fw-bold mb-1" style="color:#003366">{{ __('Informations du profil') }}</h4>
        <p class="text-muted small">
            {{ __("Mettez à jour les informations de profil et l'adresse e-mail de votre compte.") }}
        </p>
    </div>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-4">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label fw-semibold">{{ __('Nom') }}</label>
            <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">{{ __('Adresse Email') }}</label>
            <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2 p-2 bg-light rounded border">
                    <p class="small text-dark mb-1">
                        {{ __("Votre adresse e-mail n'est pas vérifiée.") }}
                    </p>
                    <button form="send-verification" class="btn btn-sm btn-link p-0 text-decoration-none">
                        {{ __("Cliquez ici pour renvoyer l'e-mail de vérification.") }}
                    </button>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-success small fw-bold">
                            {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-3 mt-4">
            <button type="submit" class="btn btn-primary px-4 fw-bold shadow-sm" style="background: #003366; border: none; border-radius: 8px;">
                {{ __('Sauvegarder') }}
            </button>

            @if (session('status') === 'profile-updated')
                <span class="text-success small fw-bold animate__animated animate__fadeIn">
                    <i class="fas fa-check-circle me-1"></i> {{ __('Enregistré.') }}
                </span>
            @endif
        </div>
    </form>
</section>
