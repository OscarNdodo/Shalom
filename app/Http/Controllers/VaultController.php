<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vault;
use Dotenv\Parser\Value;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Redirect;

class VaultController extends Controller
{
    //store
    public function store(Request $request)
    {
        $user_id = $request["user_id"];
        $user = User::find($user_id);

        if ($user == session("user")) {
            if ($request->method() == "GET") {
                return view("vault-create", [
                    "user_id" => $user_id
                ]);
            } else {

                $input = ["nome" => $request["nome"]];
                $vault = $user->vault()->create($input);
                if (!empty($vault->toArray())) {
                    return Redirect::route("safebox.all", [session("user")["id"]]);
                }
            }
        } else {
            return Redirect::route("login.home");
        }
    }

    //index
    public function indexAll(Request $request)
    {
        $user = User::find($request["user_id"]);
        $vaults = $user->vault;

        return view("vault-all", [
            "vaults" => $vaults
        ]);
    }

    //History
    public function history(Request $request)
    {
        $user_id = $request["user_id"];
        $safebox_id = $request["safebox_id"];

        $user = User::find($user_id);

        if (session("user") == $user) {
            $safebox = Vault::find($safebox_id);
            // $safebox = Vault::orderBy("created_at", "desc")->get();
            // dd($safebox->toArray());
            if (session("user")["id"] == $safebox->toArray()["user_id"]) {
                $history = [
                    "enters" => $safebox->enter,
                    "exits" => $safebox->exits
                ];

                return view("vault-history", [
                    "history" => $history #Organizar do mais recente ao mais antigo.
                ]);
            }
        }
    }
}
