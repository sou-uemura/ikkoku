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
                                    {{ $answerrequest->user->name }}
                                </h5>
                                <h5 class="card-title">
                                    {{ $answerrequest->content }}
                                </h5>

                                <a href="">twitterへ</a>
                                <a href="">評価</a>
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
