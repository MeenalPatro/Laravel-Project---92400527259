@extends('layouts.app')
@section('title', 'Features')
@section('content')
<section class="page-hero"><div class="container page-hero-inner"><span class="eyebrow">Made for peace of mind</span><h1>All your domain details, <em>in one place.</em></h1><p>Simple tools help you stay organized without getting in the way of your work.</p><span class="page-hero-flower">✧</span></div></section>
<section class="section"><div class="container"><div class="feature-grid">
@php($features = [
['✧','Easy domain management','Keep names, dates, and registrar details together.','pink'],['✎','Add and edit records','Update a domain whenever its details change.','lavender'],['▦','Organized listings','Find every record in a tidy, readable view.','blue'],['♡','Secure accounts','Your information stays in your own protected account.','peach'],['⌂','A clear admin view','Admins can care for users and records in one place.','mint'],['⌕','Search and filtering','Quickly find records by name, registrar, or status.','yellow'],['◷','Expiry tracking','See upcoming and past expiry dates at a glance.','lilac'],['✿','Ready for any screen','Manage your domain garden from phone or desktop.','sky']])
@foreach($features as [$icon,$title,$description,$tone])<article class="feature-card tone-{{ $tone }}"><span class="feature-icon">{{ $icon }}</span><span class="feature-sticker" aria-hidden="true">✧</span><h3>{{ $title }}</h3><p>{{ $description }}</p></article>@endforeach
</div></div></section>
<section class="final-cta"><div class="container final-cta-inner"><span class="final-flower">✿</span><div><h2>Ready for a calmer overview?</h2><p>Your next organized step starts here.</p></div><a class="button button-white" href="{{ route('register') }}">Create your account <span>→</span></a></div></section>
@endsection
