<?php namespace LaraMiddleware\ResponseTime;

use Closure;
use Illuminate\Contracts\Routing\Middleware;

class ResponseTime implements Middleware {

    /**
    * Add response time to response header.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return \Illuminate\Http\Response
    */
    public function handle($request, Closure $next)
    {
        $timeStart = $this->getMilliseconds();

        $response = $next($request);

        $time = $this->getMilliseconds() - $timeStart;

        $response->headers->set('X-Response-Time', sprintf('%d', $time), false);

        return $response;
    }

    /**
    * Get milliseconds for now.
    *
    * @return float
    */
    public function getMilliseconds()
    {
        return round(microtime(true) * 1000);
    }

}
