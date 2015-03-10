<?php namespace spec\LaraMiddleware\ResponseTime;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Closure;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use LaraMiddleware\ResponseTime\Timer;

class ResponseTimeSpec extends ObjectBehavior
{

    static protected $timer;

    function let(Timer $timer)
    {
        static::$timer = $timer;

        $this->beConstructedWith($timer);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('LaraMiddleware\ResponseTime\ResponseTime');
    }

    function it_should_set_response_time_to_response_header(Request $req,
                                                            Response $res,
                                                            ResponseHeaderBag $bag)
    {
        $res->headers = $bag;

        static::$timer->getStartMilliseconds()->willReturn(1.42600922494E+12);
        static::$timer->getEndMilliseconds()->willReturn(1.42600922626E+12);

        $time = 1320;

        $bag->set('X-Response-Time', sprintf('%d', $time), false)->shouldBeCalled();

        $next = function($req) use ($res) {
            return $res->getWrappedObject();
        };

        $this->handle($req, $next)->shouldReturn($res);
    }
}
