@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">質問一覧</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($questions as $question)
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $question->title }}</h5>
                                <h5 class="card-title">
                                  投稿者:{{ $question->user->name }}
                                </h5>
                                <p class="card-text">{{ $question->content }}</p>
                            <a href="{{ route('questions.show', $question->id)}}" class="btn btn-primary">詳細</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
