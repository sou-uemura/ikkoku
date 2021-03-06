@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                {{-- <div class="card"> --}}
                    <div class="card-header bg-white text-center font-weight-bold">質問詳細</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    
                        <div class="card-body bg-white border">
                            @if($question->user->icon)
                                <img class="rounded-circle mb-3 mx-auto rounded-circle" style="width:50px; height:50px; object-fit: cover;" src="{{ $question->user->icon }}">
                            @else 
                                <img class="rounded-circle mb-3" src="http://res.cloudinary.com/ikkoku/image/upload/c_fit,h_256,w_256/null_icon.jpg" >
                            @endif
          
                            投稿者:<a class="ml-1" href="{{ route('users.profile', $question->user->id) }}">{{ $question->user->name }}</a>
          
                            <h5 class="card-title border-bottom">{{ $question->title }}</h5>    
                            <p class="card-text">{{ $question->content }}</p>
                        </div>
                    </div>

                    @if ( $question->user_id  ===  Auth::id() )
                        <div class="text-center">
                            <a href="{{ route('questions.edit', $question->id) }}">
                                <button type="submit" class="button_h6 bg-white">編集</button>      
                            </a>
                        </div>
                    @endif
                {{-- </div> --}}

                @if ( $question->user_id != Auth::id() )
                    {{-- <div class="card"> --}}
                            <div class="card-header bg-white text-center font-weight-bold mt-3">リクエストを送る</div>
                                <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    {{-- <div class="card"> --}}
                                        <div class="card-body bg-white border">
                                            <form action="{{ route('answerrequests.store') }}" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                            <h5 class="card-title border-bottom mb-3">ひとこと</h5>
                                                        <textarea class="form-control" name="content" id="comment" rows="5"></textarea>
                                                    </div>
                                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                                    <input type="hidden" name="question_id" value="{{ $question->id }}">
                                                    <div class="text-center">
                                                        <button type="submit" class="button_h6 bg-white">リクエスト送信</button>
                                                    </div>
                                            </form>
                                        </div>
                                    {{-- </div> --}}
                                </div>
                        {{-- </div> --}}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
