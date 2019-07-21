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

                            <form action="{{ route('score.update') }}" method="post">
                                @csrf
                                <h5 class="card-title">
                                    わかりやすさ：<input type="text" name="easy">
                                </h5>
                                <h5 class="card-title">
                                    スピード：<input type="text" name="speed">  
                                </h5>
                                <h5 class="card-title">
                                    マナー：<input type="text" name="manner">  
                                </h5> 
                                <h5 class="card-title">
                                    解決度：<input type="text" name="understand">  
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