@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('upload_form') }}">画像アップロード</a>
                </div>
                <div class="card-body">
                    @foreach($images as $image)
                        <div style="width: 18rem; float:left; margin: 16px;">
                        <img src="{{ Storage::url($image->file_path) }}" style="width:100%;"/>
                        <p>{{ $image->file_name }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('post_form') }}">文章アップロード</a>
                </div>
                <div class="card-body">
                    @foreach($posts as $post)
                        <p>ID {{ $post->user_id }} : {{ $post->name }}</p>
                        <p> {{ $post->contents }}</p>
                        
                        @foreach($post->tags as $tag)
                            #{{ $tag->name }}
                        @endforeach
                        <p style="text-align: right">number{{ $post->id }}</p>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
