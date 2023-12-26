<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vault;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ExitController extends Controller
{
    public function remove(Request $request)
    {
        $user_id  = $request["user_id"];
        $user = User::find($user_id);
        $safebox_id  = $request["safebox_id"];

        if ($request->method() == "GET") {
            return view("vault-exit", [
                "user_id" => $user_id,
                "safebox_id" => $safebox_id
            ]);
        } else {
            if (session("user") == $user) {
                $safebox = Vault::find($safebox_id);
                if ($safebox["user_id"] == $user_id) {

                    $input = $request->validate([
                        "valor" => "required",
                        "motivo" => "required|string"
                    ]);
                    if ($input["valor"] > 0) {

                        $saldo = $safebox["saldo"] - $input["valor"];
                        
                        if ($saldo < 0) {
                            return "Saldo insuficiente!";
                        }
                        $saldo = $safebox->update([
                            "saldo" => $saldo
                        ]);
                        if ($saldo) {
                            $s = $safebox->exits()->create($input);
                        }
                    }
                }
            }
        }
        return Redirect::route("safebox.all", $user_id);
    }
}
