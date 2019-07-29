@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card"> --}}
                <div class="card-header bg-white text-center font-weight-bold">評価画面</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            
                            <form action="{{ route('scores.store', $user->id) }}" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <input type="hidden" name="answer_request_id" value="{{ app('request')->answer_request_id }}">
                                <h5 class="card-title">
                                    わかりやすさ
                                    <input class="border mt-2 mb-2" type="number" name="easy" min="0" max="10" value="5">
                                </h5>
                                <h5 class="card-title">
                                    スピード<input class="border mt-2 mb-2" type="number" name="speed" min="0" max="10" value="5">  
                                </h5>
                                <h5 class="card-title">
                                    マナー<input class="border mt-2 mb-2" type="number" name="manner" min="0" max="10" value="5">  
                                </h5> 
                                <h5 class="card-title mb-4">
                                    解決度<input class="border mt-2 mb-2" type="number" name="understand" min="0" max="10" value="5">  
                                </h5>
                                <div class="text-center mt-3 mb-2">
                                    <button type="submit" class="button_h6 bg-white">送信</button> 
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
