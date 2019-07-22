@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">profile

                    @if ( $user->id  ===  Auth::id() )
                        <a href="{{ route('users.edit', $user->id) }}" method="GET">
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
                                <h5 class="card-title">
                                  名前：{{ $user->name }}
                                </h5>
                                <h5 class="card-title">
                                  twitterID：<a href="https://twitter.com/{{ $user->twitter_id }}">＠{{ $user->twitter_id }}</a>   
                                </h5>
                                <h5 class="card-title">
                                  年齢：{{ $user->age }}
                                </h5>
                                <h5 class="card-title">
                                  一言：{{ $user->comment }}
                                </h5>
                            </div>
                        </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">評価</div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    わかりやすさ： {{ $scores['easy'] }}
                                </h5>
                                <h5 class="card-title">
                                    スピード： {{ $scores['speed'] }}
                                </h5>
                                <h5 class="card-title">
                                    マナー：{{ $scores['manner'] }}
                                </h5>
                                <h5 class="card-title">
                                    解決度：{{ $scores['understand'] }}
                                </h5>
                                <h5 class="card-title">
                                    合計：
                                </h5>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
