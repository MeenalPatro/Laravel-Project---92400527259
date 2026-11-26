<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Your dashboard') · DomainBloom</title>
    <link rel="stylesheet" href="{{ asset('css/domainbloom.css') }}"><script src="{{ asset('js/domainbloom.js') }}" defer></script>
</head>
<body class="panel-body">
    <div class="panel-shell">
        <aside class="sidebar" data-sidebar>
            <a class="brand panel-brand" href="{{ route('home') }}"><span class="brand-mark">✿</span><span>Domain<span class="brand-soft">Bloom</span><small>{{ auth()->user()->isAdmin() ? 'Admin studio' : 'Your domain garden' }}</small></span></a>
            <div class="sidebar-profile"><span class="avatar">{{ mb_substr(auth()->user()->name, 0, 1) }}</span><span><strong>{{ auth()->user()->name }}</strong><small>{{ auth()->user()->isAdmin() ? 'Administrator' : 'Member' }}</small></span></div>
            <div class="sidebar-navigation">
            @if(auth()->user()->isAdmin())
                <p class="sidebar-label">WORKSPACE</p><nav class="side-nav">
                    <a class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}"><span>⌂</span> Dashboard</a>
                    <a class="{{ request()->routeIs('admin.domains.*') ? 'active' : '' }}" href="{{ route('admin.domains.index') }}"><span>◎</span> Manage domains</a>
                    <a class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}"><span>♧</span> Manage users</a>
                </nav>
            @else
                <p class="sidebar-label">MY SPACE</p><nav class="side-nav">
                    <a class="{{ request()->routeIs('user.dashboard') ? 'active' : '' }}" href="{{ route('user.dashboard') }}"><span>⌂</span> Dashboard</a>
                    <a class="{{ request()->routeIs('user.domains.index', 'user.domains.show', 'user.domains.edit') ? 'active' : '' }}" href="{{ route('user.domains.index') }}"><span>◎</span> My domains</a>
                    <a class="{{ request()->routeIs('user.domains.create') ? 'active' : '' }}" href="{{ route('user.domains.create') }}"><span>＋</span> Add a domain</a>
                </nav>
            @endif
            <p class="sidebar-label sidebar-label-account">ACCOUNT</p><nav class="side-nav"><a class="{{ request()->routeIs('profile.*') ? 'active' : '' }}" href="{{ route('profile.edit') }}"><span>♡</span> Profile & security</a><a href="{{ route('home') }}"><span>↗</span> Visit homepage</a></nav>
            <div class="sidebar-note"><span>✧</span><p>Small steps make a beautifully organized digital world.</p></div>
            </div>
            <form action="{{ route('logout') }}" method="post" class="sidebar-logout">@csrf<button type="submit"><span>⇥</span> Sign out</button></form>
        </aside>
        <div class="panel-main">
            <header class="panel-topbar"><button class="sidebar-toggle" type="button" aria-label="Toggle sidebar" aria-expanded="false" data-sidebar-toggle>☰</button><div class="topbar-breadcrumb">{{ auth()->user()->isAdmin() ? 'Admin studio' : 'My workspace' }} <span>/</span> @yield('crumb', 'Overview')</div><div class="topbar-user"><span class="topbar-greeting">A lovely day to stay organized</span><span class="avatar avatar-small">{{ mb_substr(auth()->user()->name, 0, 1) }}</span></div></header>
            <main class="panel-content"><x-flash />@yield('content')</main>
            <footer class="panel-footer">DomainBloom <span>·</span> Your digital world, in bloom.</footer>
        </div>
    </div>
</body>
</html>
