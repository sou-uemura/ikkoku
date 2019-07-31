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
                                @foreach($scores as $score)
                                <div class="text-center">
                                    <h5 class="card-title">
                                        {{ $score['title'] }}：
                                        <select class="border mt-2 mb-2 bg-white" type="number" name="{{ $score['name'] }}">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                        </select> 点
                                    </h5>
                                </div>
                                @endforeach
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
