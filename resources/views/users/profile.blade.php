@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-header bg-white text-center font-weight-bold">プロフィール</div>
            @if ( $user->id  ===  Auth::id() )
                <div class="text-center edit-button">
                    <a href="{{ route('users.edit', $user->id) }}" method="GET">
                        <button type="submit" class="button_h6 bg-white">編集</button>      
                    </a>                           
                </div>
            @endif
            {{-- <div class="card mb-4"> --}}
                
                {{-- <div class="card-body"> --}}
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            {{-- <div class="card mb-4"> --}}
            <div class="card-body">
                <div class="card-body bg-white profile">
                    
                    <h5 class="card-text">
                    @if($user->icon)
                        <img class="d-block mx-auto" src="{{ asset("storage/icon/$user->id.jpg") }}">
                    @endif 
                        <br>名前：{{ $user->name }}
                    </h5>
                    <h5 class="card-text">
                    twitter：<a href="https://twitter.com/{{ $user->twitter_id }}">
                        ＠{{ $user->twitter_id }}</a>   
                    </h5>
                    <h5 class="card-text">
                    年齢：{{ $user->age }}
                    </h5>
                    <h5 class="card-text">
                    一言：
                    <br>{{ $user->comment }}
                    </h5>
                </div>
            </div>
                    {{-- </div> --}}
                {{-- </div> --}}
            {{-- </div> --}}

            {{-- <div class="card"> --}}
            <div class="card-header text-center bg-white font-weight-bold mb-2 mt-2">投稿中の質問</div>
                {{-- <div class="card-body"> --}}
                    {{-- <div class="card"> --}}
                        {{-- <div class="card-body"> --}}
            @foreach($user->questions as $question)
                {{-- <div class="card"> --}}
                <div class="card-body">
                    <div class="card-body profile bg-white">
                        <h5 class="card-title title pb-2">{{ $question->title }}</h5>
                        {{-- @if($question->user->icon)
                            <img class="mb-3" src="{{ asset("storage/icon/$question->user_id.jpg") }}">
                        @endif
                        <h5 class="card-title">
                        投稿者:{{ $question->user->name }}
                        </h5> --}}
                        <p class="card-text">{{ $question->content }}</p>
                        <div class="text-right">
                            <div style="display:inline-block;">
                                <a href="{{ route('questions.show', $question->id)}}" class="button_h6 bg-white">詳細</a>
                            </div>
                            @if( $user->id  ===  Auth::id() )
                                <div style="display:inline-block;">
                                    <form action="{{ route('questions.destroy', $question->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('削除してもよろしいですか？')" class="button_h6 bg-white">削除</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                {{-- </div> --}}
            @endforeach
                        {{-- </div> --}}
                    {{-- </div> --}}
                {{-- </div> --}}
            {{-- </div> --}}


            {{-- <div class="card mt-4"> --}}
            <div class="card-header text-center bg-white font-weight-bold mt-3 mb-2">評価平均</div>
            <div class="card-body">
                <div class="card-body bg-white border">
                    {{-- <div class="card"> --}}
                        <div class="card-body text-center">
                            <h5 class="card-title">
                                わかりやすさ： {{ $scores['easy'] }} / 10
                            </h5>
                            <h5 class="card-title">
                                スピード： {{ $scores['speed'] }} / 10
                            </h5>
                            <h5 class="card-title">
                                マナー：{{ $scores['manner'] }} / 10
                            </h5>
                            <h5 class="card-title">
                                解決度：{{ $scores['understand'] }} / 10
                            </h5>
                            <br>
                            <h5 class="card-title">
                                合計： {{ $sum }} / 40
                            </h5>
                        </div>
                        <div>
                            <canvas id="myChart" class="pr-2 pl-2 pb-2" width="400" height="400"></canvas>
                        </div> 
                    {{-- </div> --}}
                </div>
            </div>
            {{-- </div> --}}
            {{-- </div> --}}
        </div>
    </div>
</div>
@endsection
