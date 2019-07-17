@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">プロフィール</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                  名前：{{ $user->name }}
                                </h5>
                                <h5 class="card-title">
                                  twitterプロフィール：{{ $user->name }}       {{-- twitter_idにあとで変更 --}}
                                </h5>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
