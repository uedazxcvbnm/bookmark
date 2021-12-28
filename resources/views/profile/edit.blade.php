@extends('layouts.app')

@section('content')
<div id="profile" class="container">
    <h1>{{ $user->name }}の編集</h1>

    <div class="forms">
        <form action="{{ route('profile_show') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('put') }}
            ユーザーネーム：<input type="text" name="name" value='{{ $user->name }}'><br>
            自己紹介：<input type="text" name="introduction" value='{{ $user->introduction }}'><br>
            プロフィール写真： <input type="file" name="image" accept="image/*" ><br>
            <input type="hidden" name="id" value="{{ $user->id }}">
            <input type='submit' value='更新'>
        </form>
    </div>
    
    
</div>
@endsection