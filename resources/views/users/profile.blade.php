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
        </div>
    </div>
</div>
@endsection
