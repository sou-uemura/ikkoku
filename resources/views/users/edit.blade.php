@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card"> --}}
                <div class="card-header text-center bg-white font-weight-bold">プロフィール編集 </div>
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
                                            <img class="d-block mx-auto" src="{{ asset("storage/icon/$user->id.jpg") }}">
                                    @endif
                                    <br>
                                    アイコン<br><input type="file" name="icon">
                                </h5>
                                <h5 class="card-title">
                                    名前<br><input class="border" type="text" name="name" value="{{ $user->name }}">
                                </h5>
                                <h5 class="card-title">
                                    twitterID(＠以降)<br><input  class="border" type="text" name="twitter_id" value="{{ $user->twitter_id }}">  
                                </h5>
                                <h5 class="card-title">
                                    年齢<br><input class="border" type="text" name="age" value="{{ $user->age }}">  
                                </h5> 
                                <h5 class="card-title">
                                    メールアドレス：<input class="border" type="text" name="email" value="{{ $user->email }}">  
                                </h5>
                                <h5 class="card-title">
                                    一言：<br><textarea class="border" name="comment">{{ $user->comment }}</textarea> 
                                </h5>
                                <div class="text-center">
                                    <button type="submit" class="button_h6 bg-white">確定</button> 
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            {{-- </div> --}}
        </div>
    </div>
</div>
@endsection