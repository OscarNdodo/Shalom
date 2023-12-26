<?php

use App\Http\Controllers\BelieverController;
use App\Http\Controllers\EnterController;
use App\Http\Controllers\ExitController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VaultController;
use App\Models\Post;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Route;
use Random\CryptoSafeEngine;
use Whoops\Run;

Route::get('/', function () {
    $posts = Post::all();
    $posts->load("user");
    $posts_filtered = [];

    foreach ($posts as $post) {
        if ($post["user"]["status"] != "0") {
            array_push($posts_filtered, $post);
        }
    }
    $posts = $posts_filtered;
    $user_logged = session("user");
    return view('index', [
        "posts" => $posts,
        "user_logged" => $user_logged
    ]);
})->name("home");

//Login
Route::get("login", function () {
    return view("login");
})->name("login.home");

//Horario de cultos -statico
Route::get("/cultos", function () {
    return view("cultos");
})->name("cultos");

//User
Route::prefix("users")->group(function () {
    Route::get("/details/{user_id}", [UserController::class, "indexOne"])->name("user.details");
    Route::post("login", [UserController::class, "login"])->name("login");
    //Above routes need logged user
    Route::get("logout", [UserController::class, "logout"])->name("logout");
    Route::get("", [UserController::class, "indexAll"])->name("user.list");
    Route::get("/profile/{user_id}", [UserController::class, "profile"])->name("user.profile");
    Route::get("/create", [UserController::class, "store"])->name("user.create");
    Route::post("/create", [UserController::class, "store"])->name("user.create");
    Route::get("/update/{user_id}", [UserController::class, "update"])->name("user.update");
    Route::post("/update/{user_id}", [UserController::class, "update"])->name("user.update");
    Route::get("/lock/{user_id}", [UserController::class, "lock"])->name("user.lock");
});

//Posts
Route::prefix("posts")->group(function () {
    Route::get("/", [PostController::class, "indexAll"])->name("post.all");
    Route::post("/", [PostController::class, "indexAll"])->name("post.all");
    Route::get("/post/{post_id}", [PostController::class, "show"])->name("post.show");
    //Above routes need logged user
    Route::get("/user/{user_id}/post/{post_id}/details", [PostController::class, "indexOne"])->name("post.details");
    Route::get("/user/{user_id}/create", [PostController::class, "store"])->name("post.create");
    Route::post("/user/{user_id}/create", [PostController::class, "store"])->name("post.create");
    Route::get("/{post_id}/delete", [PostController::class, "delete"])->name("post.delete");
    Route::get("/{post_id}/update", [PostController::class, "update"])->name("post.update");
    Route::post("/{post_id}/update", [PostController::class, "update"])->name("post.update");
});

//Belivers
Route::get("/user/{user_id}/believer/create", [BelieverController::class, "create"])->name("believer.create");
Route::post("/user/{user_id}/believer/create", [BelieverController::class, "create"])->name("believer.create");
Route::get("/user/{user_id}/believers", [BelieverController::class, "indexAll"])->name("believer.all");

//Safebox
Route::prefix("safeboxs")->group(function () {
    Route::get("/user/{user_id}", [VaultController::class, "indexAll"])->name("safebox.all");
    Route::get("/user/{user_id}/create", [VaultController::class, "store"])->name("safebox.create");
    Route::post("/user/{user_id}/create", [VaultController::class, "store"])->name("safebox.create");
    Route::get("/user/{user_id}/safebox/{safebox_id}/history", [VaultController::class, "history"])->name("safebox.history");

    //insert money
    Route::get("/user/{user_id}/safebox/{safebox_id}/insert", [EnterController::class, "store"])->name("safebox.insert");
    Route::post("/user/{user_id}/safebox/{safebox_id}/insert", [EnterController::class, "store"])->name("safebox.insert");

    //get money
    Route::get("/user/{user_id}/safebox/{safebox_id}/remove", [ExitController::class, "remove"])->name("safebox.remove");
    Route::post("/user/{user_id}/safebox/{safebox_id}/remove", [ExitController::class, "remove"])->name("safebox.remove");
});
