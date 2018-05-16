<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    /**
     * Register new user
     *
     * @param $request Request
     */
    
    public function index(Request $request)
    {
        $hasher = app()->make('hash');
        $email = $request->input('email');
        $password = $request->input('password');
        $login = User::where('email', $email)->first();

        if (!$login) {

            $res['status'] = 4001;
            $res['message'] = 'Your email or password incorrect!';
            $res['data'] = new \stdClass;
            return response($res);

        } else {
            
            if ($hasher->check($password, $login->password)) {
                
                $api_token = sha1(time());
                $create_token = User::where('id', $login->id)->update(['api_token' => $api_token]);
                
                $login->api_token_new = $api_token;
                
                if ($create_token) {

                    $results['users'] = $login;
                    $res['status'] = 2000;
                    $res['message'] = 'Login Success! Welcome...';
                    $res['data'] = $results;
                    return response($res)
                            ->header('Content-Type', 'application/json')
                            ->header('Api-Token', $api_token);
                }
            } else {

                $res['status'] = 4001;
                $res['message'] = 'You email or password incorrect!';
                $res['data'] = new \stdClass;
                return response($res);
            }
        }
    }
}