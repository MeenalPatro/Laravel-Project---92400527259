@extends('layouts.panel')
@section('title', 'Add a domain record')
@section('crumb', 'Add a domain')
@section('content')
<div class="page-heading"><div><span class="eyebrow">ADMIN RECORD ENTRY</span><h1>Add a domain record</h1><p>Choose the account that owns this record.</p></div></div><x-domain-form :action="route('admin.domains.store')" :record="$record" :users="$users" :is-admin="true" submit-label="Save record" />
@endsection
