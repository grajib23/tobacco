<?php namespace App\Http\Middleware;

use Closure;

class CORSMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        //dd($request);
        $response = $next($request);

        // Perform action
        //$response->header('Access-Control-Allow-Origin' , '*');
        $response->header('Access-Control-Allow-Methods' , 'GET, POST, OPTIONS, PATCH, DELETE');
        $response->header('Access-Control-Allow-Headers' , 'Origin, Content-Type, Accept, Authorization, X-Request-With, X-CSRF-TOKEN');
        $response->header('Access-Control-Allow-Credentials',true);
        $response->header('Access-Control-Max-Age',3600);

        return $response;
	}

}
