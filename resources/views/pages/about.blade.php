@extends('layouts.app')
@section('title', 'About DomainBloom')
@section('content')
<section class="page-hero"><div class="container page-hero-inner"><span class="eyebrow">A little more about us</span><h1>Digital organization, with <em>a softer touch.</em></h1><p>DomainBloom is a simple, secure place to keep the details of the domains you already own.</p><a class="button" href="{{ route('register') }}">Start your garden <span>→</span></a><span class="page-hero-flower">✿</span></div></section>
<section class="section"><div class="container about-story"><div><span class="eyebrow">Why DomainBloom?</span><h2>Clarity makes room for <em>good things.</em></h2></div><div><p>Domain details have a way of living in inboxes, spreadsheets, and half-remembered notes. DomainBloom brings the important bits together: registrar, dates, renewal preferences, and the notes you want to keep.</p><p>We help you track information you enter. Domains are registered and renewed with your chosen registrar; DomainBloom does not purchase or renew domains for you.</p></div></div></section>
<section class="quote-section"><div class="container"><div class="quote-card"><span class="quote-mark">“</span><p>Small steps, organized beautifully, create a digital world full of possibilities.</p><span class="quote-decoration quote-flower">✿</span></div></div></section>
@endsection
