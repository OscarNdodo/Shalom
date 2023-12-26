<?php

namespace App\Http\Controllers;

use App\Models\Believer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use function Ramsey\Uuid\v1;

class BelieverController extends Controller
{
    //Create
    public function create(Request $request)
    {
        $user_id = $request["user_id"];
        $user = User::find($user_id);
        if (session()->has("user") && session("user") == $user) {
            if ($user["nivel"] == "B") {

                if ($request->method() == "GET") {
                    return view("believer-create", [
                        "user_id" => $user_id
                    ]);
                }

                $input = [
                    "user_id" => $user_id,
                    "nome" => $request["nome"],
                    "genero" => $request["genero"],
                    "data_nascimento" => $request["data_nascimento"],
                    "endereco" => $request["endereco"] == "null" ? "Nampula" : $request["endereco"],
                    "batizado" => $request["batizado"] == "null" ? "0" : $request["batizado"],
                    "cargo" => $request["cargo"] == "null" ? "Nenhuma" : $request["cargo"],
                    "contacto" => $request["contacto"]
                ];

                $believer = $user->believers()->create($input);
                if ($believer->toArray()) {
                    return Redirect::route("believer.all", [$user_id]);
                }
            } else {    
                return Redirect::route("login.home");
            }
        } else {
            return Redirect::route("login.home");
        }
    }

    //Believer's list of the user
    public function indexAll(Request $request)
    {
        $user_id = $request["user_id"];
        $user = User::find($user_id);
        $believers = $user->believers;
        return view("believer-all", [
            "believers" => $user->believers
        ]);
    }

    //Public believerrs's list
    public function indexList()
    {
        $believers = Believer::all();
        // dd($believers->toArray()); 
        return view("believer-list", [
            "believers" => $believers
        ]);
    }

    //Update believers
    public function update(Request $request)
    {
        $user_id = $request["user_id"];
        $believer_id = $request["believer_id"];
        $user = User::find($user_id);
        dd($user->believers);
    }
}
