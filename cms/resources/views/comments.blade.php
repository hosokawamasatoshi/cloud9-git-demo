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
    @if (count($comments) > 0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!-- テーブルヘッダ -->
                    <thead>
                        <th>コメント一覧</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($comments as $comment)
                        <div>
                            <tr>
                                <!-- コメント -->
                                <td class="table-text">
                                    <div>{{ $comment->user->name }}さん {{ $comment->posted_at }}</div>
                                    <div>{{ $comment->title }}</div>
                                    <div>{{ $comment->comment }}</div>
                                    @if($comment->img_name)
                                        <div><img src="upload/{{$comment->img_name}}" width="100"></div>
                                    @endif
                                    <div>
                                        <a href="{{ url('/commentreply/'.$comment->id) }}" method="GET">返信：{{ $comment->reply_num }}</a>
                                        {{ csrf_field() }}
                                    </div>
                                </td>
                            </tr>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-4 offset-md-4">
            {{ $comments->links()}}
        </div>
    </div>

@endsection