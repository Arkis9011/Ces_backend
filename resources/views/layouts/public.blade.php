<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>@yield('title', 'CES RDC | Conseil Économique et Social')</title>

  <meta property="og:type" content="website">
  <meta property="og:title" content="Conseil Économique et Social (CES) - RDC">
  <meta property="og:description" content="Site officiel du Conseil Économique et Social de la République Démocratique du Congo. Une assemblée consultative au service du développement.">
  <meta property="og:image" content="{{ asset('assets/images/logo_header.png') }}">
  <meta property="og:url" content="{{ url('/') }}">
  <meta name="twitter:card" content="summary_large_image">

  <link rel="icon" type="image/png" href="{{ asset('assets/images/logo_header.png') }}">
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Polices et icônes -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v=1.2">
  @yield('styles')
</head>
<body>

@include('public.partials.header')

<main>
    @yield('content')
</main>

@include('public.partials.footer')

<script src="{{ asset('assets/js/main.js') }}?v=1.2"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')

</body>
</html>
