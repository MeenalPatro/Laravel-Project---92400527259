@extends('layouts.app')
@section('title', 'Page not found')
@section('content')<section class="error-page"><span class="error-flower">✿</span><span class="eyebrow">A LITTLE DETOUR</span><h1>404 <em>·</em> Page not found</h1><p>We couldn’t find that page. It may have moved, or the link may need a refresh.</p><a class="button" href="{{ route('home') }}">Back to DomainBloom <span>→</span></a></section>@endsection
