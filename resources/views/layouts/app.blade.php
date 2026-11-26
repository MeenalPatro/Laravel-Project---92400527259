<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'DomainBloom') · DomainBloom</title>
    <meta name="description" content="DomainBloom keeps your digital world organized, beautifully.">
    <link rel="stylesheet" href="{{ asset('css/domainbloom.css') }}">
    <script src="{{ asset('js/domainbloom.js') }}" defer></script>
</head>
<body class="public-body">
    <header class="site-header">
        <div class="container nav-wrap">
            <a class="brand" href="{{ route('home') }}" aria-label="DomainBloom home"><span class="brand-mark">✿</span><span>Domain<span class="brand-soft">Bloom</span><small>Manage your digital world, beautifully.</small></span></a>
            <button class="nav-toggle" type="button" aria-label="Open navigation" aria-expanded="false" data-nav-toggle>☰</button>
            <nav class="main-nav" data-nav-menu>
                <a href="{{ route('home') }}">Home</a><a href="{{ route('about') }}">About</a><a href="{{ route('features') }}">Features</a><a href="{{ route('home') }}#contact">Contact</a>
                @auth
                    <a class="nav-dashboard" href="{{ route(auth()->user()->isAdmin() ? 'admin.dashboard' : 'user.dashboard') }}">My dashboard <span>↗</span></a>
                    <form action="{{ route('logout') }}" method="post" class="nav-logout">@csrf<button class="nav-link-button" type="submit">Log out</button></form>
                @else
                    <a href="{{ route('login') }}">Log in</a><a class="button button-small" href="{{ route('register') }}">Get started</a>
                @endauth
            </nav>
        </div>
    </header>
    <main>
        <x-flash />
        @yield('content')
    </main>
    <footer class="site-footer">
        <div class="container footer-grid">
            <div class="footer-brand"><a class="brand" href="{{ route('home') }}"><span class="brand-mark">✿</span><span>Domain<span class="brand-soft">Bloom</span><small>Manage your digital world, beautifully.</small></span></a><p>Keep your domain details together, so you can focus on what you’re building.</p></div>
            <div><h3>Explore</h3><a href="{{ route('about') }}">About us</a><a href="{{ route('features') }}">Features</a><a href="{{ route('home') }}#contact">Contact</a></div>
            <div><h3>Your space</h3><a href="{{ route('login') }}">Log in</a><a href="{{ route('register') }}">Create an account</a></div>
            <div><h3>A gentle reminder</h3><p>Your domains are part of your story. Keep them close and cared for.</p><a href="{{ route('home') }}#contact">Send us a note through the contact form →</a></div>
        </div>
        <div class="container footer-bottom"><span>© {{ now()->year }} DomainBloom. Made for your digital garden.</span><span>Organized with care <span class="heart">♥</span></span></div>
        <div class="container credit-wrap"><div class="developer-credit"><span class="credit-sparkle sparkle-one" aria-hidden="true">✦</span><span class="credit-flower" aria-hidden="true">✿</span><strong>Developed by - Meenal Patro</strong><span class="credit-sparkle sparkle-two" aria-hidden="true">✧</span><span class="credit-sparkle sparkle-three" aria-hidden="true">✦</span></div></div>
    </footer>
</body>
</html>
