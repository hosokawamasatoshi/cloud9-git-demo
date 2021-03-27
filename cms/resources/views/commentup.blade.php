<!-- resources/views/comments.blade.php -->
@extends('layouts.app')
@section('content')

<!-- Bootstrapの定形コード… -->
<div class="card-body">
    <div class="card-title">
        コメント
    </div>
    
    <!-- バリデーションエラーの表示に使用-->
    @include('common.errors')
    <!-- バリデーションエラーの表示に使用-->

    <!-- コメント登録フォーム -->
    <form enctype="multipart/form-data" action="{{ url('comments/store') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- コメントのタイトル -->
        <div class="form-group">
            <div class="col-sm-6">
                <label for="title" class="col-sm-3 control-label">タイトル</label>
                <input type="text" name="title" id="comment-title" class="form-control">
            </div>
            
            <div class="col-sm-6">
                <label for="comment" class="col-sm-3 control-label">テキスト</label>
                <input type="text" name="comment" id="comment-text" class="form-control">
            </div>
            
            <div class="col-sm-6">
                <label for="posted" class="col-sm-3 control-label">日付</label>
                <input type="date" name="posted_at" id="comment-posted" class="form-control">
            </div>
            <!-- file追加 -->
            <div class="col-sm-6">
                <label>画像</label>
                <input type="file" name="img_name">
            </div>
        </div>

        <!-- コメント登録ボタン -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-primary">
                    Save
                </button>
            </div>
        </div>
    </form>
</div>
    
@endsection