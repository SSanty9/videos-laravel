<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Video;

Route::get('/', function () {

	/*
	Testing DB
	$videos = Video::all();

	foreach ($videos as $video) {
		echo $video->title.' ';
		echo $video->user->email.'<br>';
		
		foreach ($video->comments as $comment) {
			echo $comment->body;
		}
		echo '<hr>';
	}
	die();

	*/
    return view('welcome');
});

Route::auth();


Route::get('/', array(
	'as' => 'home',
	'uses' => 'HomeController@index'
));

Route::get('/delete-video/{video_id}', array(
	'as' => 'videoDelete',
	'middleware' => 'auth',
	'uses' => 'VideoController@delete'

));



//Videos controller routes

Route::get('/create-video', array(
	'as' => 'createVideo',
	'middleware' => 'auth',
	'uses' => 'VideoController@createVideo'
));

Route::post('/save-video', array(
	'as' => 'saveVideo',
	'middleware' => 'auth',
	'uses' => 'VideoController@saveVideo'
));

Route::get('/thumbnail/{filename}',array(
	'as'=>'imageVideo',
	'uses' =>'VideoController@getImage'
));

Route::get('/video/{video_id}',array(
	'as'=>'detailVideo',
	'uses' =>'VideoController@getVideoDetail'
));

Route::get('/video-file/{filename}',array(
	'as'=>'fileVideo',
	'uses' =>'VideoController@getVideo'
));

Route::get('/edit-video/{video_id}', array(
	'as' => 'videoEdit',
	'middleware' => 'auth',
	'uses' => 'VideoController@edit'

));

Route::post('/update-video/{video_id}', array(
	'as' => 'updateVideo',
	'middleware' => 'auth',
	'uses' => 'VideoController@update'

));

Route::get('/search/{search?}/{filter?}', array(
	'as' => 'videoSearch',
	'uses' => 'VideoController@search'
));


//Comments

Route::post('/comment', array(
	'as' => 'comment',
	'middleware' => 'auth',
	'uses' => 'CommentController@store'

));

Route::get('/delete-comment/{comment_id}', array(
	'as' => 'commentDelete',
	'middleware' => 'auth',
	'uses' => 'CommentController@delete'

));

//Users
Route::get('/channel/{user_id}',array(
    'as' => 'channel',
    'uses' => 'UserController@channel'
));


//Cache

Route::get('/clear-cache', function(){
    $code = Artisan::call('cache:clear');
});










