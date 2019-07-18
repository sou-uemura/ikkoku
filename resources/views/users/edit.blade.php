@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="{{ route('users.plofile') }}" method="POST">
                    <div class="card-header">profile編集 
                        <button type="submit" class="btn btn-primary">確定</button>      
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
                                    名前：<input type="text" name="name" value="{{ $user->name }}">
                                    </h5>
                                    <h5 class="card-title">
                                    twitterプロフィール：<input type="text" name="name" value="{{ $user->twitter_id }}">  
                                    </h5>
                                </div>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection