<!-- resources/views/profile.blade.php -->
@extends('layouts.app')
@section('content')
<!--<script src="https://d3js.org/d3.v3.min.js"></script>-->

    <!--d3.jsなど-->
    <script src="https://d3js.org/d3.v5.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link href="{{ asset('css/lifewake.css') }}" rel="stylesheet" type="text/css">

    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">プロフィール</div>
        
        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
        
        <div id="lifewake-title">ライフウエイクチャート</div>
        <div id="svg-area"></div>
        <ul id="sortable">
        <li>
            <label for="slider0">0:<span id="slider0-value"></span></label>
            <input id="slider0" type="range" min="0" max="100" step="5" class="input-range">
            <input id="event-title0" type="text" name="title">
            <textarea id="event-content0" name="content"></textarea>
            <input id="btn0" type="submit" value="保存">
        </li>
        <li>
            <label for="slider1">1:<span id="slider1-value"></span></label>
            <input id="slider1" type="range" min="0" max="100" step="5" class="input-range">
            <input id="event-title1" type="text" name="title">
            <textarea id="event-content1" name="content"></textarea>
        </li>
        <li>
            <label for="slider2">2:<span id="slider2-value"></span></label>
            <input id="slider2" type="range" min="0" max="100" step="5" class="input-range">
            <input id="event-title2" type="text" name="title">
            <textarea id="event-content2" name="content"></textarea>
        </li>
        <li>
            <label for="slider3">3:<span id="slider3-value"></span></label>
            <input id="slider3" type="range" min="0" max="100" step="5" class="input-range">
            <input id="event-title3" type="text" name="title">
            <textarea id="event-content3" name="content"></textarea>
        </li>
        <li>
            <label for="slider4">4:<span id="slider4-value"></span></label>
            <input id="slider4" type="range" min="0" max="100" step="5" class="input-range">
            <input id="event-title4" type="text" name="title">
            <textarea id="event-content4" name="content"></textarea>
        </li>
        <li>
            <label for="slider5">5:<span id="slider5-value"></span></label>
            <input id="slider5" type="range" min="0" max="100" step="5" class="input-range">
            <input id="event-title5" type="text" name="title">
            <textarea id="event-content5" name="content"></textarea>
        </li>
        <li>
            <label for="slider6">6:<span id="slider6-value"></span></label>
            <input id="slider6" type="range" min="0" max="100" step="5" class="input-range">
            <input id="event-title6" type="text" name="title">
            <textarea id="event-content6" name="content"></textarea>
        </li>
        <li>
            <label for="slider7">7:<span id="slider7-value"></span></label>
            <input id="slider7" type="range" min="0" max="100" step="5" class="input-range">
            <input id="event-title7" type="text" name="title">
            <textarea id="event-content7" name="content"></textarea>
        </li>
        <li>
            <label for="slider8">8:<span id="slider8-value"></span></label>
            <input id="slider8" type="range" min="0" max="100" step="5" class="input-range">
            <input id="event-title8" type="text" name="title">
            <textarea id="event-content8" name="content"></textarea>
        </li>
        <li>
            <label for="slider9">9:<span id="slider9-value"></span></label>
            <input id="slider9" type="range" min="0" max="100" step="5" class="input-range">
            <input id="event-title9" type="text" name="title">
            <textarea id="event-content9" name="content"></textarea>
        </li>
        </ul>

    <!-- 以上、一旦削除 -->
        <!--<div style="width: 80%;margin: 0 auto;">-->
        <!--<div id="chart"></div>-->

        <!--<script src="js/d3.min.js"></script>-->
        <!--<script src="js/c3.min.js"></script>-->
        <!--<link href="css/c3.min.css" rel="stylesheet">-->
        
        <!--<script src="https://d3js.org/d3.v3.min.js"></script>-->
        <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.10/c3.min.css" rel="stylesheet">-->
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/c3/0.4.10/c3.min.js"></script>-->
        
        <!--<script src="{{mix('/js/lifewake.js')}}"></script>-->
        <!--<div id="mychart"></div>-->
    <!-- 以上、一旦削除 -->

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