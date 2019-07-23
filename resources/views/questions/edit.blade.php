@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">質問編集 </div>
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
                                <h5 class="card-title">題名</h5>
                                <input type="text" name="title" value="{{ $question->title }}">
                                <h5 class="card-text">質問内容</h5>
                                <textarea name="content">{{ $question->content }}</textarea>
                                <br>
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