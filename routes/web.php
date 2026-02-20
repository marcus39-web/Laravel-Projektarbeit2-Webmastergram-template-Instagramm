<?php
use App\Http\Controllers\UserSearchController;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\GithubController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\TimelineController;

Route::get('/timeline', [TimelineController::class, 'index'])->middleware(['auth', 'verified'])->name('timeline');

// Dashboard-Route auf Timeline umleiten
Route::get('/dashboard', function () {
    return redirect()->route('timeline');
})->middleware(['auth', 'verified'])->name('dashboard');

use App\Http\Controllers\FollowController;

use App\Models\User;


use App\Http\Controllers\NotificationController;

Route::middleware('auth')->group(function () {
    Route::get('/users/search', [UserSearchController::class, 'index'])->name('users.search');
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/search', [ProfileController::class, 'search'])->name('profile.search');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::patch('/profile/image', [ProfileController::class, 'updateImage'])->name('profile.image.update');
    Route::get('/posts/create', function() {
        return view('posts.create');
    })->name('posts.create');
    Route::post('/posts', [\App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
    Route::post('/users/{user}/follow', [FollowController::class, 'follow'])->name('users.follow');
    Route::post('/posts/{post}/like', [\App\Http\Controllers\LikeController::class, 'like'])->name('posts.like');
    Route::delete('/posts/{post}/unlike', [\App\Http\Controllers\LikeController::class, 'unlike'])->name('posts.unlike');
    Route::delete('/users/{user}/unfollow', [FollowController::class, 'unfollow'])->name('users.unfollow');
});

Route::get('/users/{user}', function (User $user) {
    return view('users.show', [
        'user' => $user,
        'posts' => $user->posts()->latest()->get(),
    ]);
})->name('users.show');

Route::get('/auth/github', [GithubController::class, 'redirect'])->name('github.login');
Route::get('/auth/github/callback', [GithubController::class, 'callback']);

require __DIR__.'/auth.php';
