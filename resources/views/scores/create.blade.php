@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">評価画面</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('scores.update', $user->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <h5 class="card-title">
                                    わかりやすさ：<input type="number" name="easy" min="0" max="25" value="0">
                                </h5>
                                <h5 class="card-title">
                                    スピード：<input type="number" name="speed" min="0" max="25" value="0">  
                                </h5>
                                <h5 class="card-title">
                                    マナー：<input type="number" name="manner" min="0" max="25" value="0">  
                                </h5> 
                                <h5 class="card-title">
                                    解決度：<input type="number" name="understand" min="0" max="25" value="0">  
                                </h5>
                                <h5 class="card-title">
                                    合計：
                                </h5>
                                <button type="submit" class="btn btn-primary">送信</button> 
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
