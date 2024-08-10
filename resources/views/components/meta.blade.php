<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{isset($title) ? $title . " | " : ""}}Guess Color</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700;800&display=swap" rel="stylesheet">
    
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/headroom/0.12.0/headroom.min.js" integrity="sha512-9UsrKTYzS9smDm2E58MLs0ACtOki+UC4bBq4iK5wi7lJycwqcaiHxr1bdEsIVoK0l5STEzLUdYyDdFQ5OEjczw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @vite('resources/scss/main.scss')

    <!-- Chrome, Firefox OS and Opera mobile address bar theming -->
    <meta name="theme-color" content="#ffffff">
    <!-- Windows Phone mobile address bar theming -->
    <meta name="msapplication-navbutton-color" content="#ffffff">
    <!-- iOS Safari mobile address bar theming -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#ffffff">

    @php
      $site_title = (isset($title) ? $title . " | " : "") . env('APP_NAME');
      $site_description = isset($description) ? $description : "Guess Color is an intuitive color tool that provides accurate color information with models like RGB, HSL, HSV, CMYK, CSS, and HTML color codes.";
    
      $ititle = isset($title) ? $title : env('APP_NAME');
      $ogtext = isset($hex) ? $hex : $ititle;

      $site_image = isset($image) ? $image : "https://og.guesscolor.com/image/$ogtext";
    @endphp

    <title>{{ $site_title }}</title>
    <link rel="canonical" href="{{url()->current()}}">
    <meta name="title" content="{{ $site_title }}">
    <meta name="description" content="{{$site_description}}">
    <meta name="keywords" content="{{isset($keywords) ? $keywords : ""}}color like, color recommendation, guess color, color blog, search color, hex color">
    <meta name="author" content="{{env('APP_NAME')}}">
    <meta name="robots" content="index, follow">
    <link rel="icon" type="image/x-icon" href="{{ asset('/favicon.png') }}">

    <script type="application/ld+json">
        {"author":{"@type":"Person","name":"{{env('APP_NAME')}}"},"headline":"{{$site_title}}","description":"{{$site_description}}","@type":"WebSite","name":"{{env('APP_NAME')}}"},"url":"{{url()->current()}}","name":"{{env('APP_NAME')}}","@context":"https://schema.org"}
    </script>

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{url()->current()}}">
    <meta name="og:site_name" content="{{env('APP_NAME')}}">
    <meta property="og:title" content="{{ $site_title }}">
    <meta property="og:description" content="{{$site_description}}">
    <meta property="og:image" content="{{ $site_image }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{url()->current()}}">
    <meta property="twitter:title" content="{{ $site_title }}">
    <meta property="twitter:description" content="{{$site_description}}">
    <meta property="twitter:image" content="{{ $site_image }}">
    
    <link
      rel="preload"
      href="https://fonts.googleapis.com/css2?family=Signika&amp;family=Vollkorn:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&amp;display=swap"
      as="style"
      onload="this.onload=null;this.rel='stylesheet'"
    />
    <noscript>
        <link
            href="https://fonts.googleapis.com/css2?family=Signika&amp;family=Vollkorn:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&amp;display=swap"
            rel="stylesheet"
            type="text/css"
        />
    </noscript>

    @if (env('APP_ENV') == 'production')
    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-TXMZC0Q9YL"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-TXMZC0Q9YL');
    </script>

    @endif

</head>
<body>

    <main>
        {{$slot}}
    </main>

    @vite('resources/js/app.js')

</body>
</html>