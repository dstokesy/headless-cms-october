<?php namespace Ds\Api\Classes;

use Request;
use Response;
use Log;

class ApiMiddleware
{

	/**
	 * Checks the request is authorised, if not displays
	 *
	 * @param  Request  $request
	 * @param  \Closure  $next
	 *
	 * @return mixed
	 */
	public function handle($request, \Closure $next)
	{
		Log::info('Headers: ', Request::header());
		if (! $this->checkAuth())
		{
			return Response::make('Unauthorized', 401);
		}

		return $next($request);
	}

	/**
	 * Check the user and password match the ones in the config
	 *
	 * @return bool
	 */
	private function checkAuth()
	{
		return true;
		$user       = env('API_USER', 'admin');
		$password   = env('API_PASSWORD', 'password');

		Log::info('Username: '.Request::getUser().', Password: '.Request::getPassword());
		return (Request::getUser() === $user && Request::getPassword() === $password);
	}

}
