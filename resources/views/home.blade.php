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
                
                <div class="card-body">
                    <a href="{{ route('upload_form') }}">Upload</a>
                    <hr />
                    
                    @foreach($images as $image)
                        <div style="width: 18rem; float:left; margin: 16px;">
                        <img src="{{ Storage::url($image->file_path) }}" style="width:100%;"/>
                        <p>{{ $image->file_name }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
