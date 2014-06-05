<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

interface GreetableInterface
{
	public function greet();
}

class HelloJustin implements GreetableInterface {
	public function greet()
	{
		return 'Hello, Justin!';
	}
}

class GoodbyeCruelWorld implements GreetableInterface {
	public function greet()
	{
		return 'Goodbye cruel, unforgiving, world!';
	}
}

App::bind('GreetableInterface', 'GoodbyeCruelWorld');

Route::get('/container', 'ContainerController@container');

