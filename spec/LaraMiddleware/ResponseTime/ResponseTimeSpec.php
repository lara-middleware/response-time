<?php namespace spec\LaraMiddleware\ResponseTime;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Closure;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

function round()
{
    static $enterBefore;

    if ($enterBefore)
    {
        return 1.42590138753E+12;
    }
    else
    {
        $enterBefore = true;
        return 1.42590138641E+12;
    }
}

class ResponseTimeSpec extends ObjectBehavior
{

    function it_is_initializable()
    {
        $this->shouldHaveType('LaraMiddleware\ResponseTime\ResponseTime');
    }

    function it_should_set_response_time_to_response_header(Request $req,
                                                            Response $res,
                                                            Closure $next,
                                                            ResponseHeaderBag $bag)
    {
        $next->shouldBeCalled()->willReturn($res);

        $res->headers = $bag;

        $time = 112;

        $res->headers->set('X-Response-Time', sprintf('%d', $time), false)->shouldBeCalled();

        $this->handle($req, $next)->shouldReturn($res);
    }
}
