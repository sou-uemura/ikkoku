@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <div class="card">
                    <div class="card-header">質問詳細
                        @if ( $question->user_id  ===  Auth::id() )
                            <a href="{{ route('questions.edit', $question->id) }}">
                                <button type="submit" class="btn btn-primary">編集</button>      
                            </a>
                        @endif
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('users.profile', $question->user->id) }}">
                                    投稿者:{{ $question->user->name }}
                                </a>
                                <h5 class="card-title">{{ $question->title }}</h5>    
                                <p class="card-text">{{ $question->content }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                @if ( $question->user_id != Auth::id() )
                    <div class="card">
                            <div class="card-header">リクエストを送る</div>
                                <div class="card-body">
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="{{ route('answerrequests.store') }}" method="POST">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="content">一言</label>
                                                        <textarea class="form-control" name="content" id="comment" rows="5"></textarea>
                                                    </div>
                                                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                                    <input type="hidden" name="question_id" value="{{ $question->id }}">
                                                
                                                    <button type="submit" class="btn btn-primary">リクエストを送信</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
