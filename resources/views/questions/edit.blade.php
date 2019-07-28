@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card"> --}}
                <div class="card-header text-center bg-white font-weight-bold">質問編集 </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('questions.update', $question->id) }}" method="post">
                                @csrf
                                <h5 class="card-title border-bottom pb-2">題名</h5>
                                <input class="border span8" type="text" name="title" value="{{ $question->title }}">
                                <h5 class="card-text mt-4 border-bottom pb-2 mb-3">質問内容</h5>
                                <textarea class="border" width="100%" name="content">{{ $question->content }}</textarea>
                                <br>
                                <div class="text-center mt-3">
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