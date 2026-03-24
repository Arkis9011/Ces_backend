<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Connexion | Administration CES</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

  <style>
    /* ... (Ton CSS reste exactement le même, je ne le change pas) ... */
    body { background: #f8f9fa; display: flex; align-items: center; justify-content: center; min-height: 100vh; margin: 0; font-family: 'Inter', sans-serif; }
    .auth-container { width: 100%; max-width: 420px; padding: 15px; }
    .auth-card { background: #fff; border-radius: 16px; padding: 40px 30px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border-top: 5px solid #003366; }
    .auth-logo { text-align: center; margin-bottom: 30px; }
    .auth-logo img { max-width: 120px; margin-bottom: 10px; }
    .auth-title { font-family: 'Playfair Display', serif; color: #003366; font-weight: 700; text-align: center; font-size: 1.5rem; margin-bottom: 25px; }
    .form-group label { font-weight: 600; color: #333; margin-bottom: 8px; font-size: 0.9rem; }
    .form-control { border: 1.5px solid #d8e4f0; border-radius: 8px; padding: 12px 15px; transition: all 0.3s ease; }
    .btn-auth { background: #003366; color: #fff; width: 100%; padding: 12px; border-radius: 8px; font-weight: 600; border: none; transition: all 0.3s ease; margin-top: 15px; }
    .btn-auth:hover { background: #0055aa; transform: translateY(-2px); }
    .back-link { display: block; text-align: center; color: #666; margin-top: 20px; font-size: 0.85rem; text-decoration: none; }
  </style>
</head>
<body>

  <div class="auth-container">
    <div class="auth-card">
      <div class="auth-logo">
        <img src="{{ asset('assets/images/LOGO.png') }}" alt="Logo CES">
        <div class="s-tag justify-content-center mt-2 mb-0" style="font-size: 0.75rem;">Espace Administration</div>
      </div>
      
      <h1 class="auth-title">Connexion</h1>

@if ($errors->any())
    <div class="alert alert-danger d-flex align-items-center py-2 mb-3" style="font-size: 0.85rem; border-radius: 8px; border: none; background-color: rgba(220, 53, 69, 0.1); color: #dc3545;">
        <i class="fas fa-exclamation-triangle me-2"></i>
        <div>Identifiants invalides. Veuillez vérifier vos informations.</div>
    </div>
@endif
      
      <form method="POST" action="{{ route('login') }}">
        @csrf <div class="form-group mb-3">
          <label for="email">Adresse Email</label>
          <input type="email" id="email" name="email" class="form-control" placeholder="" value="{{ old('email') }}" required autofocus>
        </div>
        
        <div class="form-group mb-4">
          <label for="password">Mot de passe</label>
          <input type="password" id="password" name="password" class="form-control" placeholder="" required>
        </div>
        
        <button type="submit" class="btn-auth">
          <i class="fas fa-sign-in-alt me-2"></i> Se connecter
        </button>
      </form>
      
      <a href="{{ url('/') }}" class="back-link">
        <i class="fas fa-arrow-left me-1"></i> Retour au site principal
      </a>
    </div>
  </div>

</body>
</html>