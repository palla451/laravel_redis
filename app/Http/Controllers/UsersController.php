<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('index',compact('users'));
    }


    /**
     * @param $id
     * @return mixed
     */
    public function showProfile($id)
    {

        // Check if user already in redis with cache key user.1 for example
        if (!Redis::exists('user.' . $id)) {
            // If the user is not in redis, fetch it from DB and add it in redis for 60 seconds before returning it
            $user = User::findOrFail($id);
            Redis::set('user.' . $user->id, $user, 'EX', 60);

        } else {
            // If user is in redis, just return it without querying the database
            $user =  json_decode(Redis::get('user.'.$id));
        }


        return view('user.profile', compact('user'));
    }
}
