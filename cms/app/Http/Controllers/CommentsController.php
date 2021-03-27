<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Comment;
use App\Reply;
use Validator;
use Auth;

class CommentsController extends Controller
{
    public function __construct()
    {
        //認証していたら表示する
        $this->middleware('auth');
    }
   
    //表示
    public function index(){
        $comments = Comment::orderBy('posted_at', 'desc')->paginate(10);
        return view('comments', [
            'comments' => $comments
        ]);
        //return view('comments',compact('comments')); //も同じ意味
    }

    //プロフィール画面
    public function profile(){
        $comments = Comment::where('user_id', Auth::user()->id)->orderBy('posted_at', 'desc')->paginate(10);
        return view('profile', [
            'comments' => $comments
        ]);
    }
    
    //新規登録画面
    public function upload(Comment $comment){
        return view('commentup', ['comment' => $comment]);
    }

    //新規登録
    public function store(Request $request){
        //バリデーション
        $validator = Validator::make($request->all(), [
            'title'     => 'required|max:100',
            'comment'   => 'required|max:255',
            'posted_at' => 'required',
        ]);
    
        //バリデーション:エラー 
        if ($validator->fails()){
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        
        //file取得
        $file = $request->file('img_name');
        //fileが空かチェック
        if(!empty($file)){
            //ファイル名を取得
            $filename = $file->getClientOriginalName();
            //AWSの場合どちらかになる事がある "../upload/" or "./upload/"
            $move = $file->move('./upload/',$filename);
        }else{
            $filename = "";
        }
        
        //Eloquentモデル
        $comments = new Comment;
        $comments->title     = $request->title;
        $comments->comment   = $request->comment;
        $comments->user_id   = Auth::user()->id;
        $comments->posted_at = $request->posted_at;
        $comments->img_name  = $filename;
        $comments->reply_num = '0';
        $comments->like_num  = '0';
        $comments->save(); 
        return redirect('/');
    }

    //更新画面
    public function edit(Comment $comments){
        return view('commentsedit', ['comment' => $comments]);
    }
    
    //更新処理
    public function update(Request $request){
        //バリデーション
        $validator = Validator::make($request->all(), [
            'id'        => 'required',
            'title'     => 'required|max:100',
            'comment'   => 'required|max:255',
            'reply_num' => 'required',
            'posted_at' => 'required',
        ]);
        //バリデーション:エラー
        if ($validator->fails()){
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        
        //file取得
        $file = $request->file('img_name');
        //fileが空かチェック
        if(!empty($file)){
            //ファイル名を取得
            $filename = $file->getClientOriginalName();
            //AWSの場合どちらかになる事がある "../upload/" or "./upload/"
            $move = $file->move('../upload/',$filename);
        }else{
            $filename = "";
        }
        
        //データ更新
        $comments = Comment::find($request->id);
        $comments->title     = $request->title;
        $comments->comment   = $request->comment;
        $comments->reply_num = $request->reply_num;
        $comments->posted_at = $request->posted_at;
        $comments->img_name  = $filename;
        $comments->save();
        return redirect('/profile');
    }
    
    //リプライ表示画面
    public function reply(Comment $comments){

        //リプライ一覧用データ
        $replies = Reply::where('reply_comment_id',$comments->id)->get(); //whereの戻り値はBuilderクラスなのでget()
        return view('commentreply', [
            'comment' => $comments,
            'replies' => $replies,
            'user' => Auth::user()->id,
        ]);
    }
    
    //リプライ登録処理
    public function exeReply(Comment $comments,Request $request){
        //バリデーション
        $validator = Validator::make($request->all(), [
            'reply_comment' => 'required|max:255',
        ]);
        //バリデーション:エラー 
        if ($validator->fails()){
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
        
        //Eloquentモデル
        $replies = new Reply;
        $replies->reply_comment_id = $comments->id;
        $replies->user_id = Auth::user()->id;
        $replies->reply_comment = $request->reply_comment;
        $replies->save(); 
        
        //データ更新
        $comments->increment('reply_num');

        return redirect('/commentreply/'.$comments->id);
    }

    //コメント削除
    public function destroy(Comment $comment){
        $comment->delete();
        
        return redirect('/profile');
    }
    
    //リプライ削除
    public function remove(Reply $reply){
        $reply->delete();

        $comments = Comment::find($reply->reply_comment_id);
        $comments->decrement('reply_num');
        
        return redirect('/commentreply/'.$comments->id);
    }
}