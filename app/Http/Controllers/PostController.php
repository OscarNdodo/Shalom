<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    //Create a post
    public function store(Request $request)
    {
        $user_id = $request["user_id"];
        $user = User::find($user_id);

        if (!$user) {
            return "User not found";
        }
        if (session()->has("user")) {
            $user_logged = session("user");

            if ($user_logged == $user) {

                if ($request->method() == "GET") {
                    return view("post-create", [
                        "user_id" => $user_id
                    ]);
                } else if ($request->method() == "POST") {
                    if ($request["foto"] != null) {
                        $input = $request->validate([
                            "titulo" => "string|required",
                            "descricao" => "string|required",
                            "foto" => "file|mimes:png,jpeg,jpg,bmp"
                        ]);
                        $path = $request["foto"]->store("capa", "public");
                    } else {
                        $input = $request->validate([
                            "titulo" => "string|required",
                            "descricao" => "string|required",
                        ]);
                        $path = $request["foto"] = "capa/noimage.jpg";
                    }

                    $input["foto"] = $path;
                    $user->posts()->create($input);
                    return Redirect::route("user.profile", [$user["id"]]);
                }
            }
        }
        return Redirect::route("user.profile", [$user_logged["id"]]);
    }

    //Show post's user detail
    public function show(Request $request)
    {
        $post_id = $request["post_id"];
        $post = Post::find($post_id);
        if ($post) {
            return view("post-detail", [
                "post" => $post
            ]);
        } else {
            return Redirect::route("/");
        }
    }
    //List of the posts
    public function indexAll(Request $request)
    {
        if ($request->method() == "POST") {
            $search = $request['search'];
            $posts = Post::where("titulo", "like", "%$search%")
                ->orWhere("descricao", "like", "%$search%")
                ->get();

            $posts_filtered = [];
            foreach ($posts as $post) {
                if ($post["status"] != "0") {
                    array_push($posts_filtered, $post);
                }
            }
            $posts = $posts_filtered;
            $user_logged = session("user");
            return view('index', [
                "posts" => $posts,
                "user_logged" => $user_logged
            ]);
        }

        $posts = Post::all();
        $posts->load("user");
        // dd($posts);
        $posts_filtered = [];
        foreach ($posts as $post) {
            if ($post["status"] != "0") {
                array_push($posts_filtered, $post);
            }
        }
        $posts = $posts_filtered;
        $user_logged = session("user");
        return view('index', [
            "posts" => $posts,
            "user_logged" => $user_logged
        ]);
    }

    //Details of the post
    public function indexOne(Request $request)
    {
        $user_id = $request["user_id"];
        $post_id = $request["post_id"];

        $post = Post::find($post_id);
        $post->user;

        if ($post["user"]["id"] == $user_id) {
            // dd($post->toArray());
            return view("post-index", [
                "post" => $post,
            ]);
        } else {
            return "Not found!";
        }
    }

    //Delete a post
    public function delete(Request $request)
    {
        $post_id = $request["post_id"];
        $post = Post::find($post_id);
        $post->user;
        $post->delete();

        if ($post) {
            return Redirect::route("user.details", [$post["user"]["id"]]);
        } else {
            return false;
        }
    }

    //Update a post
    public function update(Request $request)
    {
        $post_id = $request["post_id"];
        $post = null;
        $input = null;

        if ($request->method() == "GET") {
            $post = Post::find($post_id);
            return view("post-update", [
                "post" => $post
            ]);
        } else if ($request->method() == "POST") {
            $post = Post::find($post_id);
            if ($request["foto"] != null) {

                $input = $request->validate([
                    "titulo" => "string|required",
                    "descricao" => "string|required",
                    "foto" => "file|mimes:png,jpeg,jpg"
                ]);

                $path = $request["foto"]->store("capa", "public");
                $input["foto"] = $path;
            } else {
                $input = $request->validate([
                    "titulo" => "string|required",
                    "descricao" => "string|required",
                ]);

                $path = $post["foto"];
                $input["foto"] = $path;
            }
            $post = $post->update($input);

            return Redirect::route("user.profile", [
                "user_id" => session("user")["id"],
            ]);
        }
    }
}
