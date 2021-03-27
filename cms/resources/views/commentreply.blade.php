<!-- resources/views/comments.blade.php -->
@extends('layouts.app')
@section('content')

<!-- Bootstrapの定形コード… -->
<div class="card-body">
    <div class="card-title">
        タイトル画像
    </div>
</div>

<!-- Comment: 既に登録されてるコメントのリスト -->
<!-- 現在のコメント -->
<div class="card-body">
    <div class="card-body">
        <table class="table table-striped task-table">
            <thead>
                <th>コメント</th>
            </thead>
            <tbody>
                <tr>
                    <td class="table-text">
                        <div>{{ $comment->user->name }}さん {{ $comment->posted_at }}</div>
                        <div>{{ $comment->title }}</div>
                        <div>{{ $comment->comment }}</div>
                        <div><img src="/upload/{{$comment->img_name}}" width="100"></div>
                        <form action="{{ url('comment/'.$comment->id) }}" method="POST">
                            {{ csrf_field() }}
                            <div>返信：{{ $comment->reply_num }}</div>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- 返信一覧 -->
@if (count($replies) > 0)
<div class="card-body">
    <div class="card-body">
        <table class="table table-striped task-table">
            <thead>
                <th>リプライ一覧</th>
            </thead>
            <tbody>
                @foreach ($replies as $reply)
                <div>
                    <tr>
                        <td class="table-text">
                            <div>{{ $reply->user->name }}さん {{ $reply->created_at }}</div>
                            <div>{{ $reply->reply_comment }}</div>
                        </td>

                        <!-- 本: 削除ボタン -->
                        @if($reply->user->id === Auth::id())
                        <td>
                            <form action="{{ url('/commentreply/remove/'.$reply->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button type="submit" class="btn btn-danger">
                                   削除
                                </button>
                            </form>
                        </td>
                        @endif
                    </tr>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
<!-- Bootstrapの定形コード… -->
<div class="card-body">
    <div class="card-title">
        返信書き込み
    </div>
    
    <!-- バリデーションエラーの表示に使用-->
    @include('common.errors')
    <!-- バリデーションエラーの表示に使用-->

    <!-- 返信登録フォーム -->
    <form enctype="multipart/form-data" action="{{ url('/commentreply/reply/'.$comment->id) }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <div class="form-group">
            <div class="col-sm-6">
                <label for="comment" class="col-sm-3 control-label">テキスト</label>
                <input type="text" name="reply_comment" id="reply_text" class="form-control">
            </div>
        </div>

        <!-- 返信登録ボタン -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-primary">
                    返信
                </button>
            </div>
        </div>
    </form>
</div>

@endsection