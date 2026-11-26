@extends('layouts.panel')
@section('title', 'Edit domain')
@section('crumb', 'Edit domain')
@section('content')
<div class="page-heading"><div><span class="eyebrow">A LITTLE UPDATE</span><h1>Edit {{ $record->domain_name }}{{ $record->domain_extension }}</h1><p>Keep this record current with a few quick changes.</p></div></div><x-domain-form :action="route('user.domains.update', $record)" method="PUT" :record="$record" submit-label="Save changes" />
@endsection
