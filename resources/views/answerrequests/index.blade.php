@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">リクエスト確認</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($questions as $question) 
                        @foreach($question->answerRequests as $answerrequest)
                        {{-- @dd($answerrequest) --}}
                            @if($answerrequest)
                            <div class="card">
                                <h5 class="card-title">
                                    <a href="{{ action('UserController@show', $answerrequest->user->id) }}">
                                    {{ $answerrequest->user->name }}
                                    </a>
                                </h5>
                                <h5 class="card-title">
                                    {{ $answerrequest->content }}
                                </h5>

                                <a href="https://twitter.com/{{ $answerrequest->user->twitter_id }}">twitterへ</a>
                                <a href="{{ route('scores.create', $answerrequest->user_id) }}">評価</a>
                                <form action="{{ route('answerrequest.destroy', $answerrequest->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="削除" class="btn btn-danger btn-sm">
                                </form>
                            </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
