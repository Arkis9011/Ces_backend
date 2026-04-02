<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Réinitialisation | Administration CES</title>
  <link rel="icon" type="image/png" href="{{ asset('assets/images/logo_header.png') }}">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

  <style>
    body { background: #f4f7fa; min-height: 100vh; display: flex; font-family: 'Inter', sans-serif; }
    .admin-sidebar { width: 280px; background: #003366; color: #fff; display: flex; flex-direction: column; position: fixed; top: 0; bottom: 0; left: 0; z-index: 100; transition: all 0.3s; }
    .admin-brand { padding: 24px; border-bottom: 1px solid rgba(255,255,255,0.1); display: flex; align-items: center; gap: 15px; }
    .admin-brand img { width: 50px; background: #fff; padding: 4px; border-radius: 8px; }
    .admin-brand span { font-family: 'Playfair Display', serif; font-weight: 700; font-size: 1.1rem; line-height: 1.2; }
    .admin-nav { flex: 1; padding: 20px 0; overflow-y: auto; }
    .admin-nav a, .admin-nav button { display: flex; align-items: center; gap: 12px; padding: 12px 24px; color: rgba(255,255,255,0.7); text-decoration: none; transition: all 0.2s; font-weight: 500; font-size: 0.95rem; border: none; background: none; width: 100%; text-align: left; }
    .admin-nav a:hover, .admin-nav a.active { color: #ffcc00; background: rgba(255,255,255,0.05); border-left: 4px solid #ffcc00; }
    .admin-main { flex: 1; margin-left: 280px; display: flex; flex-direction: column; min-height: 100vh; }
    .admin-topbar { height: 70px; background: #fff; border-bottom: 1px solid #e5ebf4; display: flex; align-items: center; justify-content: space-between; padding: 0 30px; position: sticky; top: 0; z-index: 90; }
    .admin-user { display: flex; align-items: center; gap: 10px; font-weight: 600; color: #333; }
    .admin-content { padding: 30px; flex: 1; display: flex; align-items: center; justify-content: center; }
    .admin-card { background: #fff; border-radius: 12px; border: 1px solid #e5ebf4; padding: 30px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); width: 100%; max-width: 500px; }
    .admin-card-header { display: flex; align-items: center; gap: 10px; margin-bottom: 25px; padding-bottom: 15px; border-bottom: 1px solid #e5ebf4; }
    .admin-card-header h3 { font-family: 'Playfair Display', serif; font-size: 1.3rem; color: #003366; margin: 0; }
    @media (max-width: 991px) { .admin-sidebar { transform: translateX(-100%); } .admin-sidebar.show { transform: translateX(0); } .admin-main { margin-left: 0; } .mobile-menu-btn { display: block; } }
    .mobile-menu-btn { display: none; background: none; border: none; font-size: 1.5rem; color: #003366; }
  </style>
</head>
<body>

  <aside class="admin-sidebar" id="sidebar">
    <div class="admin-brand">
      <img src="{{ asset('assets/images/LOGO.png') }}" alt="Logo CES">
      <span>Dashboard<br>Administrateur</span>
    </div>
    <nav class="admin-nav">
      <a href="{{ route('dashboard') }}"><i class="fas fa-newspaper"></i> Actualités</a>
      <a href="{{ route('dashboard') }}#events"><i class="fas fa-calendar-alt"></i> Agenda</a>
      <a href="{{ route('dashboard') }}#videos"><i class="fas fa-video"></i> Vidéos</a>
      <a href="{{ route('dashboard') }}#avis"><i class="fas fa-balance-scale"></i> Avis rendus</a>
      
      <a href="{{ route('profile.edit') }}" class="active"><i class="fas fa-user-cog"></i> Mon Profil</a>
      <a href="{{ url('/') }}" style="margin-top: 30px;"><i class="fas fa-globe"></i> Retour au site</a>
      
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="text-danger">
          <i class="fas fa-sign-out-alt"></i> Déconnexion
        </button>
      </form>
    </nav>
  </aside>

  <main class="admin-main">
    <header class="admin-topbar">
      <button class="mobile-menu-btn" id="menuToggle"><i class="fas fa-bars"></i></button>
      <div class="ms-auto admin-user">
        <i class="fas fa-user-circle fs-4" style="color:#007fff"></i>
        <span>{{ Auth::user()->name ?? 'Utilisateur' }}</span>
      </div>
    </header>

    <div class="admin-content">
      <div class="admin-card">
        <div class="admin-card-header text-center d-block">
          <i class="fas fa-key fa-2x text-primary mb-3"></i>
          <h3>Réinitialisation du mot de passe</h3>
          <p class="text-muted small">Veuillez définir votre nouveau mot de passe sécurisé.</p>
        </div>

        <form method="POST" action="{{ route('password.store') }}">
          @csrf

          <!-- Password Reset Token -->
          <input type="hidden" name="token" value="{{ $request->route('token') }}">

          <!-- Email Address -->
          <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Adresse Email</label>
            <input id="email" class="form-control bg-light" type="email" name="email" value="{{ old('email', $request->email) }}" required readonly autocomplete="username" />
            @if($errors->has('email'))
              <div class="text-danger small mt-1">{{ $errors->first('email') }}</div>
            @endif
          </div>

          <!-- Password -->
          <div class="mb-3">
            <label for="password" class="form-label fw-semibold">Nouveau mot de passe</label>
            <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
            @if($errors->has('password'))
              <div class="text-danger small mt-1">{{ $errors->first('password') }}</div>
            @endif
          </div>

          <!-- Confirm Password -->
          <div class="mb-4">
            <label for="password_confirmation" class="form-label fw-semibold">Confirmer le mot de passe</label>
            <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
            @if($errors->has('password_confirmation'))
              <div class="text-danger small mt-1">{{ $errors->first('password_confirmation') }}</div>
            @endif
          </div>

          <div class="d-grid">
            <button type="submit" class="btn btn-primary py-2 fw-bold text-white shadow-sm" style="background: #003366; border: none; border-radius: 8px;">
              Mettre à jour le mot de passe
            </button>
          </div>
        </form>
      </div>
    </div>
  </main>

  <script>
    // Toggle Mobile Sidebar
    document.getElementById('menuToggle').addEventListener('click', function() {
      document.getElementById('sidebar').classList.toggle('show');
    });

    @if(session('status'))
        Swal.fire({
            icon: 'success',
            title: 'Succès',
            text: "{{ session('status') }}",
            confirmButtonColor: '#003366'
        });
    @endif
  </script>

</body>
</html>
