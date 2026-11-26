@extends('layouts.panel')
@section('title', 'Add a domain')
@section('crumb', 'Add domain')
@section('content')
<div class="page-heading"><div><span class="eyebrow">GROW YOUR COLLECTION</span><h1>Add a domain <span class="heading-flower">✿</span></h1><p>Keep the details you’ll want to remember later.</p></div></div><x-domain-form :action="route('user.domains.store')" :record="$record" submit-label="Save domain" />
@endsection
