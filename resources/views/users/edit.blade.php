@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card"> --}}
                <div class="card-header text-center bg-white font-weight-bold">プロフィール編集 </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data" method="post">
                                @csrf
                                <h5 class="card-title border-bottom">
                                    @if($user->icon)
                                        <img class="d-block mx-auto" src="{{ $user->icon }}">
                                    @else
                                        <img class="d-block mx-auto" src="http://res.cloudinary.com/ikkoku/image/upload/c_fit,h_256,w_256/null_icon.jpg">
                                    @endif
                                    <br>
                                    アイコン<br>
                                </h5>
                                {{-- こっちボタンは使いたい --}}
                                <div class="input-group">
                                    <label class="">
                                        <span class="button_h6 bg-white">
                                            ファイル選択<input type="file" name="icon" style="display:none">
                                        </span>
                                    </label>
                                    <input type="text" class="form-control" id="icon" readonly="">
                                </div>
                                {{-- こっちは動いてる --}}
                                {{-- <div class="input-group">
                                    <label class="input-group-btn">
                                        <span class="btn btn-primary">
                                            Choose File<input type="file" style="display:none">
                                        </span>
                                    </label>
                                    <input type="text" class="form-control" id="unchi" readonly="">
                                </div> --}}
                                
                                <h5 class="card-title border-bottom mt-2">
                                    名前<br>
                                </h5><input class="border" type="text" name="name" value="{{ $user->name }}">
                                <h5 class="card-title border-bottom mt-3">
                                    twitterID(＠以降)<br>
                                </h5><input  class="border" type="text" name="twitter_id" value="{{ $user->twitter_id }}">  
                                <h5 class="card-title border-bottom mt-3">
                                    年齢<br> 
                                </h5><select class="border bg-white" type="number" name="age">
                                        @for($i = 1; $i < 100; $i++)
                                            <option>{{ $i }}</option>
                                        @endfor
                                    </select>
                                 {{-- <input class="border" type="text" name="age" value="{{ $user->age }}"> --}}
                                <h5 class="card-title border-bottom mt-3">
                                    メールアドレス：
                                </h5><input class="border" type="text" name="email" value="{{ $user->email }}">  
                                <h5 class="card-title border-bottom mt-3">
                                    一言：<br>
                                </h5><textarea class="border" name="comment">{{ $user->comment }}</textarea> 
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
<script>
// 画面上のなんかが変わったら、なんかする、の例
// changeは、イベント
$(document).on('change', ':file', function() {
    var input = $(this),
    numFiles = input.get(0).files ? input.get(0).files.length : 1,
    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    
    // jqueryで画面上の要素を取ってきて書き換える例
    $('#icon').val(label);
});
</script>
@endsection