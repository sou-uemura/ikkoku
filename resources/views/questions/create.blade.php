@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">質問投稿</div>
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
                        <form action="{{ 'store' }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">題名</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="title"　name="title">
                            </div>

                            <div class="form-group">
                                <label for="content">Comment</label>
                                <textarea class="form-control" name="content" id="comment" rows="5"></textarea>
                            </div>
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        
                            <button type="submit" class="btn btn-primary">投稿</button>
                        </form>

                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
