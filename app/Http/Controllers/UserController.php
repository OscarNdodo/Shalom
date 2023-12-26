<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

	//Show all users
	public function indexAll()
	{
		if (session()->has("user")) {
			$user = session()->get("user");
			if ($user["nivel"] == "A") {
				$users = User::all();
				$users_filtered = [];
				foreach ($users as $user) {
					if ($user["nivel"] != "A") {
						array_push($users_filtered, $user);
					}
				}
				$users = $users_filtered;
				return view("users-list", [
					"users" => $users,
				]);
			} else {
				return Redirect::intended();
			}
			// dd($user->toArray());
		} else {
			return Redirect::route("login.home");
		}
	}

	//Show user details
	public function indexOne(Request $request)
	{
		$user_id = $request["user_id"];
		$user = User::find($user_id);
		$user->posts;
		// dd($user->toArray());
		return view("user-details", [
			"user" => $user,
		]);
	}

	// Create user
	public function store(Request $request)
	{

		if (session()->has("user")) {
			$user_logged = session("user");
			if ($user_logged["nivel"] == "A") {

				if ($request->method() == "GET") {
					return view("user-create");
				} else if ($request->method() == "POST") {

					$cargo = $request["cargo"];
					$nivel = "D";
					$status = "0";

					switch ($cargo) {
						case "admin": {
								$nivel = "A";
								break;
							}
						case "secretaria": {
								$nivel = "B";
								break;
							}
						case "financas": {
								$nivel = "C";
								break;
							}
						default:
							$nivel = "D"; {
								break;
							}
					}
					$input = [
						"nome" 		=> $request["nome"],
						"telefone" 	=> $request["telefone"],
						"cargo" 	=> $request["cargo"],
						"nivel" 	=> $nivel,
						"status" 	=> $status,
						"senha" 	=> Crypt::encryptString($request["senha"])
					];
					// $u = User::all()->where($input["telefone"]);
					// dd($u);
					User::create($input);
					return Redirect::route("user.list");
				} else {
					return Redirect::route("home");
				}
			} else {
				return Redirect::route("login.home");
			}
		} else {
			return Redirect::route("login.home");
		}
	}

	// Update user
	public function update(Request $request)
	{

		$user_id = $request["user_id"];
		if (session()->has("user")) {
			$user_logged = session("user");
			if ($user_logged["nivel"] == "A") {
				if ($request->method() == "GET") {
					$user = User::find($user_id);
					$user["senha"] = Crypt::decryptString($user["senha"]);
					return view("user-update", [
						"user" 		=> $user,
					]);
				} else if ($request->method() == "POST") {
					$user = User::find($user_id);
					$cargo = $request["cargo"];
					$nivel = $user["nivel"];
					$status = $user["status"];

					switch ($cargo) {
						case "admin": {
								$nivel = "A";
								break;
							}
						case "secretaria": {
								$nivel = "B";
								break;
							}
						case "financas": {
								$nivel = "C";
								break;
							}
						default:
							$nivel = "D"; {
								break;
							}
					}
					$input = [
						"nome" 		=> $request["nome"],
						"telefone" 	=> $request["telefone"],
						"cargo" 	=> $request["cargo"],
						"nivel" 	=> $nivel,
						"status" 	=> $status,
						"senha" 	=> Crypt::encryptString($request["senha"])
					];

					$is_updated = $user->update($input);
					if ($is_updated) {
						return Redirect::route("user.list");
					} else {
						return Redirect::route("user.update", $user_id);
					}
				}
			} else {
				return Redirect::route("login.home");
			}
		} else {
			return Redirect::route("login.home");
		}
	}

	// Lock user
	public function lock(Request $request)
	{
		$user_id = $request["user_id"];
		if (session()->has("user")) {
			$user_logged = session("user");
			if ($user_logged["nivel"] == "A") {

				$user = User::find($user_id);
				$status = null;
				if ($user["status"] == "0") {
					$status = "1";
				} else {
					$status = "0";
				}

				$user->update([
					"status" => $status
				]);

				return Redirect::route("user.list");
			} else {
				return Redirect::route("login.home");
			}
		} else {
			return Redirect::route("login.home");
		}
	}

	//Login of the user
	public function login(Request $request)
	{
		$telefone = $request["telefone"];
		$senha = $request["senha"];
		if ($telefone == null && $senha == null) {
			return Redirect::route("login.home");
		}

		$user = User::where("telefone", $telefone)->first();
		if ($user) {
			if (Crypt::decryptString($user["senha"]) == $senha) {
				if ($user["status"] == 1) {
					session(["user" => $user]);

					if ($user["nivel"] == "A") {
						return Redirect::route("user.profile", [$user["id"]]);
					} else {
						return Redirect::route("user.profile", [
							$user["id"]
						]);
					}
				}
			}
		}
		return Redirect::route("login.home");
	}

	//Logout's user
	public function logout()
	{
		session()->flush();
		return Redirect::route("home");
	}

	//Profil of the user
	public function profile(Request $request)
	{
		$user_logged = session()->get("user");
		$user_id = $request["user_id"];
		if (session()->has("user")) {
			$user = User::find($user_id);
			if ($user_logged == $user) {
				// session()->put("user", $user);
				return view("user-profile", [
					"user" => $user,
				]);
			}
		}
		return Redirect::route("login.home");
	}
}
