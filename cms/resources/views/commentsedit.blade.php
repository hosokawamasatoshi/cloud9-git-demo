@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
    @include('common.errors')
    <form enctype="multipart/form-data" action="{{ url('comments/update') }}" method="POST">

        <!-- item_name -->
        <div class="form-group">
            <label for="item_name">タイトル</label>
            <input type="text" id="item_title" name="title" class="form-control" value="{{$comment->title}}">
        </div>

        <!-- item_number -->
        <div class="form-group">
            <label for="item_number">テキスト</label>
        <input type="text" id="item_text" name="comment" class="form-control" value="{{$comment->comment}}">
        </div>

        <!-- item_amount -->
        <div class="form-group">
            <label for="item_amount">リプライ数</label>
        <input type="text" id="item_reply" name="reply_num" class="form-control" value="{{$comment->reply_num}}">
        </div>

        <!-- published -->
        <div class="form-group">
            <label for="published">日付</label>
            <input type="datetime" id="item_posted" name="posted_at" class="form-control" value="{{$comment->posted_at}}">
        </div>

        <!-- file追加 -->
        <div class="form-group">
            <label>画像</label>
            <input type="file" id="img_name" name="img_name" class="form-control" value="{{$comment->img_name}}">
        </div>

        <!-- Saveボタン/Backボタン -->
        <div class="well well-sm">
            <button type="submit" class="btn btn-primary">Save</button>
            <a class="btn btn-link pull-right" href="{{ url('/profile') }}">
                <i class="glyphicon glyphicon-backward"></i>Back
            </a>
        </div>
        <!--/ Saveボタン/Backボタン -->
        
        <!-- id値を送信 -->
        <input type="hidden" name="id" value="{{$comment->id}}" />
        <!--/ id値を送信 -->
        
        <!-- CSRF -->
        {{ csrf_field() }}
        <!--/ CSRF -->
        
    </form>
    </div>
</div>
@endsection