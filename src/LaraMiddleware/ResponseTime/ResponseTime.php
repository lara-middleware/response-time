<?php namespace LaraMiddleware\ResponseTime;

use Closure;
use Illuminate\Contracts\Routing\Middleware;


class ResponseTime implements Middleware {

    /**
     * The timer instance.
     *
     * @var LaraMiddleware\ResponseTimeTimer
     */
    protected $timer;

    /**
     * Create a new filter instance.
     *
     * @param  LaraMiddleware\ResponseTime\Timer  $timer
     * @return void
     */
    public function __construct(Timer $timer)
    {
        $this->timer = $timer;
    }


    /**
    * Add response time to response header.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure  $next
    * @return \Illuminate\Http\Response
    */
    public function handle($request, Closure $next)
    {
        $timeStart = $this->timer->getStartMilliseconds();

        $response = $next($request);

        $time = $this->timer->getEndMilliseconds() - $timeStart;

        $response->headers->set('X-Response-Time', sprintf('%dms', $time), false);

        return $response;
    }

}
