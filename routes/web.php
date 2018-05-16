<?php

// $settrip->get('/', function () use ($settrip) {
//     return $settrip->app->version();
// });

// $settrip->get('/key', function() {
//     return str_random(32);
// });

$settrip->get('/', function () use ($settrip) {
	$results['version'] = $settrip->app->version();
	$res['status'] = 2000;
	$res['message'] = "Hello world!";
	$res['data'] = $results;
	return response($res);
});

$settrip->post('/login', 'LoginController@index');
$settrip->post('/register', 'UserController@register');
$settrip->get('/user/{id}', ['middleware' => 'auth', 'uses' =>  'UserController@getUser']);

//HOME

$settrip->get('/destination', ['middleware' => 'auth', 'uses' =>  'HomeController@getDestination']);
$settrip->get('/banner', ['uses' =>  'HomeController@getBanner']);
$settrip->get('/howItWork', ['uses' =>  'HomeController@getHowitwork']);
$settrip->get('/bestAttraction', ['uses' =>  'HomeController@getBestAttraction']);
$settrip->get('/topDestination', ['uses' =>  'HomeController@getTopDestination']);

//TRIP CUSTOM

$settrip->get('/trip/guide', ['middleware' => 'auth', 'uses' =>  'TripController@guide']);
$settrip->get('/trip/transportation', ['middleware' => 'auth', 'uses' =>  'TripController@transportation']);
$settrip->get('/trip/destination', ['middleware' => 'auth', 'uses' =>  'TripController@destination']);

//FILTER

$settrip->get('/categories/{type}', ['uses' => 'FilterController@category']);
$settrip->get('/tags/{type}', ['uses' => 'FilterController@tag']);