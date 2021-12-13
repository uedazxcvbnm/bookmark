@extends('layouts.app')

@section('content')
<div id="profile" class="container">
    <h1>{{ Auth::user()->name }}のプロフィール</h1>
    
</div>
@endsection