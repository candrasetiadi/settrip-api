<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;

class Authenticate
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed 
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($this->auth->guard($guard)->guest()) {
            // return response('Unauthorized.', 401);

            if ($request->headers->has('Secret-Token')) {
                // $token = $request->headers->get('Api-Token');
                // $check_token = User::where('api_token', $token)->first();
                
                // if ($check_token == null) {
                $res['status'] = 4001;
                $res['message'] = 'Permission not allowed!';
                $res['data'] = new \stdClass;

                return response($res);
                // }
            } elseif ($request->headers->has('Api-Token')) {
                // $token = $request->headers->get('Api-Token');
                // $check_token = User::where('api_token', $token)->first();
                
                // if ($check_token == null) {
                $res['status'] = 4001;
                $res['message'] = 'Permission not allowed!';
                $res['data'] = new \stdClass;

                return response($res);
                // }
            } else {
                $res['status'] = 4001;
                $res['message'] = 'Login please!';
                $res['data'] = new \stdClass;

                return response($res);
            }
        }

        return $next($request);
    }
}
