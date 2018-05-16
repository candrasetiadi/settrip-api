<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Register new user
     *
     * @param $request Request
     */
    public function register(Request $request)
    {
        $hasher = app()->make('hash');
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $hasher->make($request->input('password'));

        $register = User::create([
            'name'=> $name,
            'email'=> $email,
            'password'=> $password,
        ]);

        if ($register) {

            $res['status'] = 2000;
            $res['message'] = 'Success register!';
            $res['data'] = new \stdClass;
            return response($res);

        } else {

            $res['status'] = 4001;
            $res['message'] = 'Failed to register!';
            $res['data'] = new \stdClass;
            return response($res);

        }
    }
    /**
     * Get user by id
     *
     * URL /user/{id}
     */
    public function getUser(Request $request, $id)
    {
        $user = User::where('id', $id)->get();
        if ($user) {

              $results['user'] = $user;

              $res['status'] = 2000;
              $res['message'] = 'Success get data user';
              $res['data'] = $results;

              return response($res);

        } else {

          $res['status'] = 4001;
          $res['message'] = 'Cannot find user!';
          $res['data'] = new \stdClass;
        
          return response($res);
        }
    }
}