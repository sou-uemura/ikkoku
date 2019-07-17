@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">質問詳細</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $question->title }}</h5>
                                    <a href="{{ action('UserController@show', $question->user->id) }}">
                                        投稿者:{{ $question->user->name }}
                                    </a>
                                <p class="card-text">{{ $question->content }}</p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
