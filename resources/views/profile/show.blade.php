@extends('layouts.app')

@section('content')
<div id="profile" class="container">
    <h1>{{ $user->name }}のプロフィール</h1>
    <img src="{{ asset('storage/profiles/'.$user->profile_image) }}" alt="プロフィール画像" width="150px">
    <h3>自己紹介</h3>
    <p>{{ $user->introduction }}</p>
    <button type=“button” onclick="location.href='/edit'">編集</button>
</div>
@endsection