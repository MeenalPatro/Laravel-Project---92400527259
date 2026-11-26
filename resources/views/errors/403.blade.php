@extends('layouts.app')
@section('title', 'Access unavailable')
@section('content')<section class="error-page"><span class="error-flower">🌷</span><span class="eyebrow">THIS SPACE IS PRIVATE</span><h1>403 <em>·</em> Not this time</h1><p>You don’t have permission to view this page. Let’s take you somewhere that’s yours.</p><a class="button" href="{{ auth()->check() ? route(auth()->user()->isAdmin() ? 'admin.dashboard' : 'user.dashboard') : route('home') }}">Back to your garden <span>→</span></a></section>@endsection
