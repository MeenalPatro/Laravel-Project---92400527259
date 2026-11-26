@extends('layouts.panel')
@section('title', 'Edit domain record')
@section('crumb', 'Edit domain')
@section('content')
<div class="page-heading"><div><span class="eyebrow">ADMIN RECORD EDIT</span><h1>Edit {{ $domain->domain_name }}{{ $domain->domain_extension }}</h1><p>Update details or reassign this record to another account.</p></div></div><x-domain-form :action="route('admin.domains.update', $domain)" method="PUT" :record="$domain" :users="$users" :is-admin="true" submit-label="Save changes" />
@endsection
