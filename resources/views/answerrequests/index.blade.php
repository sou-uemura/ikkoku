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

                    @if (!filled($questions))
                        <div class="text-center mt-5 mb-5 title-border">まずは質問してみましょう！</div>
                    @endif

                    

                    @foreach($questions as $question) 
  
                        @if (filled($questions) && !filled($question->answerrequest))
                            <div class="text-center mt-5 mb-5 title-border">現在リクエストはありません。</div>
                        @endif
                        
                        @foreach($question->answerRequests as $answerrequest)
                            @if($answerrequest)
                                <div class="card-body bg-white border mb-3">
                                    <h5 class="card-title">
                                        <a href="{{ route('users.profile', $answerrequest->user->id) }}">
                                        
                                        @if($answerrequest->user->icon)
                                            <img src="{{ asset("storage/icon/$answerrequest->user_id.jpg") }}">
                                        @else 
                                            <img src="{{ asset("images/null-icon.jpg") }}">
                                        @endif
                                        {{ $answerrequest->user->name }}
                                        </a>
                                    </h5>
                                    <h5 class="card-title">
                                        {{ $answerrequest->content }}
                                    </h5>
                                    <div style="display:inline-block; width:32%;" class="text-center mt-2">
                                        <a href="https://twitter.com/{{ $answerrequest->user->twitter_id }}" target="_blank"> <button type="submit" class="button_h6 twitter-button text-white">twitter</button></a>
                                    </div>
                                    <div style="display:inline-block; width:33%;" class="text-center mt-2">
                                        <a href="{{ route('scores.create', ['user' => $answerrequest->user_id, 'answer_request_id' => $answerrequest->id]) }}"> <button type="submit" class="button_h6 bg-white">評価</button></a>
                                    </div>
                                    <div style="display:inline-block; width:32%;" class="text-center mt-2">
                                        <form action="{{ route('answerrequests.destroy', $answerrequest->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            
                                            <button type="submit" onclick="return confirm('削除してもよろしいですか？')" class="button_h6 delete-button text-white">削除</button>
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
