@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card"> --}}
                <div class="card-header bg-white text-center font-weight-bold">質問一覧</div>
                {{-- <div class="text-center mt-3 title-border pb-2">質問一覧</div> --}}
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($questions as $question)
                        <div class="card mb-3">
                            <div class="card-body"> 
                                <h5 class="card-title">
                                    @if($question->user->icon)
                                        <img class="rounded-circle img-fluid  mx-auto" style="width:50px; height:50px; object-fit: cover;" src="{{ $question->user->icon }}" width="50px" heigth="auto">
                                    @else 
                                        <img class="rounded-circle" src="http://res.cloudinary.com/ikkoku/image/upload/c_fit,h_256,w_256/null_icon.jpg" width="50px" heigth="auto">
                                    @endif
                                    <a class="ml-2" href="{{ route('users.profile', $question->user->id) }}">{{ $question->user->name }}</a>
                                </h5>
                                <h5 class="card-title title">{{ $question->title }}</h5>
                               
                                <p class="card-text">{{ $question->content }}</p>
                                <div class="text-right">
                                    <a href="{{ route('questions.show', $question->id)}}" class="button_h6">詳細</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="text-center">
                        {{ $questions->links() }}
                    </div>
                </div>
            {{-- </div> --}}
        </div>
    </div>
</div>
@endsection
