<!-- resources/views/profile.blade.php -->
@extends('layouts.app')
@section('content')

    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            プロフィール
        </div>
        
        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- バリデーションエラーの表示に使用-->

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
                            <tr>
                                <!-- 本タイトル -->
                                <td class="table-text">
                                    <div>{{ $comment->user->name }}さん</div>
                                    <div>{{ $comment->posted_at }}</div>
                                    <div>{{ $comment->title }}</div>
                                    <div>{{ $comment->comment }}</div>
                                    <div><img src="upload/{{$comment->img_name}}" width="100"></div>
                                    <div>
                                        <a href="{{ url('/commentreply/'.$comment->id) }}" method="GET">返信：{{ $comment->reply_num }}</a>
                                    </div>
                                </td>
                                
                                <!-- 本: 更新ボタン -->
                                <td>
                                    <form action="{{ url('commentsedit/'.$comment->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-primary">
                                            <i class="glyphicon glyphicon-pencil"></i> 更新
                                        </button>
                                    </form>
                                </td>

                                <!-- 本: 削除ボタン -->
                                <td>
                                    <form action="{{ url('comment/'.$comment->id) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                        <button type="submit" class="btn btn-danger">
                                           削除
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-md-4 offset-md-4">
            {{  $comments->links()}}
        </div>
    </div>

@endsection