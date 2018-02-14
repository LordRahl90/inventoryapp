<?php namespace App\Http\Middleware;

/**
 * This file is part of Entrust,
 * a role & permission management solution for Laravel.
 *
 * @license MIT
 * @package Zizaco\Entrust
 */

use App\Models\User;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class EntrustRole
{
	protected $auth;

	/**
	 * Creates a new instance of the middleware.
	 *
	 * @param Guard $auth
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  Closure $next
	 * @param  $roles
	 * @return mixed
	 */
	public function handle($request, Closure $next, $roles)
	{

		if ($this->auth->guest() || !$request->user()?? User::find($request->user()->id)->hasRole(explode('|', $roles))) {
//			abort(403);
            return redirect("/");
		}

		if(!User::find($request->user()->id)->hasRole(explode('|', $roles))){
		    return redirect("/home");
        }

		return $next($request);
	}
}
