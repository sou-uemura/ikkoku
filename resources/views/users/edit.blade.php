@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">profile編集 </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data" method="post">
                                @csrf
                                <h5 class="card-title">
                                    @if($user->icon)
                                        <img src="{{ asset("storage/icon/$user->id.jpg") }}">
                                    @endif
                                    <br>
                                    アイコン：<input type="file" name="icon">
                                </h5>
                                <h5 class="card-title">
                                    名前：<input type="text" name="name" value="{{ $user->name }}">
                                </h5>
                                <h5 class="card-title">
                                    twitterID：@<input type="text" name="twitter_id" value="{{ $user->twitter_id }}">  
                                </h5>
                                <h5 class="card-title">
                                    年齢：<input type="text" name="age" value="{{ $user->age }}">  
                                </h5> 
                                <h5 class="card-title">
                                    メールアドレス：<input type="text" name="email" value="{{ $user->email }}">  
                                </h5>
                                <h5 class="card-title">
                                    一言：<br><textarea name="comment">{{ $user->comment }}</textarea> 
                                </h5>
                                
                               
                                <button type="submit" class="btn btn-primary">確定</button> 
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection