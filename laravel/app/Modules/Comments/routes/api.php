<?php

use App\Modules\Comments\Http\Controllers\CommentController;

Route::get('comments/get', [CommentController::class, 'get']);

Route::group(['middleware' => ['jwt.auth', 'jwt.refresh']], function () {
    Route::get('comments/find', [CommentController::class, 'find']);
    Route::get('comments/paginate', [CommentController::class, 'paginate']);
    Route::put('comments/{id}/restore', [CommentController::class, 'restore']);
    Route::resource('comments', CommentController::class);
});
