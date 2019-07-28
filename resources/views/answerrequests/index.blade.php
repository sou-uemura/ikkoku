@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card"> --}}
                <div class="card-header text-center bg-white font-weight-bold">リクエスト確認</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($questions as $question) 
                        @foreach($question->answerRequests as $answerrequest)
                            @if($answerrequest)
                            <div class="card-body bg-white border mb-3">
                                <h5 class="card-title">
                                    <a href="{{ route('users.profile', $answerrequest->user->id) }}">
                                    
                                    @if($answerrequest->user->icon)
                                        <img src="{{ asset("storage/icon/$question->user_id.jpg") }}">
                                    @endif
                                    {{ $answerrequest->user->name }}
                                    </a>
                                </h5>
                                <h5 class="card-title">
                                    {{ $answerrequest->content }}
                                </h5>
                                <div style="display:inline-block; width:35%;" class="text-center mt-2">
                                    <a href="https://twitter.com/{{ $answerrequest->user->twitter_id }}"> <button type="submit" class="button_h6 bg-white">twitterへ</button></a>
                                </div>
                                <div style="display:inline-block; width:37%;" class="text-center mt-2">
                                    <a href="{{ route('scores.create', ['user' => $answerrequest->user_id, 'answer_request_id' => $answerrequest->id]) }}"> <button type="submit" class="button_h6 bg-white">評価</button></a>
                                </div>
                                <div style="display:inline-block; width:25%;" class="text-center mt-2">
                                    <form action="{{ route('answerrequests.destroy', $answerrequest->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button type="submit" onclick="return confirm('削除してもよろしいですか？')" class="button_h6 bg-danger text-white">削除</button>
                                    </form>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    @endforeach
                </div>
            {{-- </div> --}}
        </div>
    </div>
</div>
@endsection
