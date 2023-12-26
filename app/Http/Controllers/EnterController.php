<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vault;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EnterController extends Controller
{
    public function store(Request $request)
    {
        $user_id  = $request["user_id"];
        $user = User::find($user_id);
        $safebox_id  = $request["safebox_id"];

        if ($request->method() == "GET") {
            return view("vault-enter", [
                "user_id" => $user_id,
                "safebox_id" => $safebox_id
            ]);
        } else {
            if (session("user") == $user) {
                $safebox = Vault::find($safebox_id);
                if ($safebox["user_id"] == $user_id) {

                    $input = $request->validate([
                        "valor" => "required"
                    ]);

                    if ($input["valor"] > 0) {

                        $saldo = $safebox["saldo"] + $input["valor"];

                        $saldo = $safebox->update([
                            "saldo" => $saldo
                        ]);

                        if ($saldo) {
                            $s = $safebox->enter()->create($input);
                        }
                    }
                }
            }
        }
        return Redirect::route("safebox.all", $user_id);
    }
}
