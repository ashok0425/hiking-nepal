<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @hasSection('fullTitle')
            @yield('fullTitle')
        @elseif (Route::currentRouteName() === 'home')
            Nepal Trekking with Local Experts | Hiking Nepal
        @elseif (trim($__env->yieldContent('title')))
            @yield('title') | Hiking Nepal
        @else
            Hiking Nepal
        @endif
    </title>

    <link rel="canonical" href="https://www.hikingnepal.com{{ strtok(request()->getRequestUri(), '?') }}">

    @yield('meta')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Pacifico&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css"
        integrity="sha256-5uKiXEwbaQh9cgd2/5Vp6WmMnsUr3VZZw0a8rKnOKNU=" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')<!-- Google tag (gtag.js) -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const navbar = document.querySelector("#mainNavbar");
            const scrollThreshold = window.innerHeight * 0.7; // 70vh in pixels

            window.addEventListener("scroll", function () {
                if (window.scrollY > scrollThreshold) {
                    navbar.style.backgroundColor = "rgba(2, 93, 100, 0.6)"; // Increased opacity
                } else {
                    navbar.style.backgroundColor = "rgba(2, 93, 100, 0.3)"; // Default opacity
                }
            });
        });
        </script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QWWL15NJJQ"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-QWWL15NJJQ');
    </script>
</head>

<body>
    @include('inc.navbar')

    <main>
        @yield('content')
    </main>

    <div class="wa-popup"><a href="https://api.whatsapp.com/send?phone=9779802342080"
            class="d-inline-flex align-items-center gap-1 text-dark"><img src="{{ asset('images/whatsapp-hd.png') }}"
                alt="whatsapp" width="50" height="50"></a></div>

    @include('inc.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"
        integrity="sha256-FZsW7H2V5X9TGinSjjwYJ419Xka27I8XPDmWryGlWtw=" crossorigin="anonymous"></script>

    <script src="{{ asset('js/app.js') }}"></script>

    @stack('scripts')
</body>

</html>
