@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card"> --}}
                <div class="card-header bg-white text-center font-weight-bold">質問投稿</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-body bg-white border">
                            <form action="{{ route('questions.store') }}" method="POST">
                                @csrf
                                <div class="form-group mb-4">
                                    <label for="exampleInputEmail1">題名</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="題名" name="title">
                                </div>

                                <div class="form-group mb-4">
                                    <label for="content">質問内容</label>
                                    <textarea class="form-control" name="content" id="comment" rows="5" placeholder="質問内容"></textarea>
                                </div>
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                <div class="text-center">
                                    <button type="submit" class="button_h6 bg-white">投稿</button>
                                </div>
                            </form>
                        </div>
                    </div>
            {{-- </div> --}}
        </div>
    </div>
</div>
@endsection
