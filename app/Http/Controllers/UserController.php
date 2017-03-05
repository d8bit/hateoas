<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;

class UserController extends BaseController
{
    public function index()
    {
        $users = \App\User::with('Cars')->get();
        return \Response::json($users);
    }


    public function info($user_id)
    {
        try {
            $user = \App\User::with('Cars')->findOrFail($user_id);
            return \Response::json($user);
        } catch (\Exception $e) {
            return \Response::json('User not found', 404);
        }
    }

    public function cars($user_id)
    {
        $cars = \App\Models\Car::where('fk_user', $user_id)->get();
        return \Response::json($cars);
    }

    public function delete($user_id)
    {
        try {
            $user = \App\User::findOrFail($user_id);
            $res = $user->delete();
            return \Response::json($res);
        } catch (\Exception $e) {
            return \Response::json($e->getMessage(), 400);
        }
    }


}
