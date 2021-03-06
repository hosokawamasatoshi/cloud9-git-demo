<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

use App\Comment;
use Illuminate\Http\Request;

//コメントのダッシュボード表示(comments.blade.php)
Route::get('/','CommentsController@index');

//プロフィール画面
Route::get('/profile','CommentsController@profile');

//チャート
// Route::get('chart', 'ChartController@index');

//新規コメント登録画面へ移動
Route::get('/commentup','CommentsController@upload')->name('upload');

//新規コメント登録処理
Route::post('/comments/store','CommentsController@store');

//コメント更新画面へ移動
Route::post('/commentsedit/{comments}','CommentsController@edit')->name('edit');

//コメント更新処理
Route::post('/comments/update','CommentsController@update');

//コメントを削除　★要追加　関連返信
Route::delete('/comment/{comment}','CommentsController@destroy');

//リプライを削除
Route::delete('/commentreply/remove/{reply}','CommentsController@remove');

//リプライ画面へ移動
Route::get('/commentreply/{comments}','CommentsController@reply')->name('reply');

//リプライ登録処理
Route::post('/commentreply/reply/{comments}','CommentsController@exeReply');

Auth::routes();
Route::get('/home','CommentsController@index')->name('home');
