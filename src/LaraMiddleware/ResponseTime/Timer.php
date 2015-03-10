<?php namespace LaraMiddleware\ResponseTime;


class Timer {

    /**
    * Get milliseconds for now.
    *
    * @return float
    */
    private function getMilliseconds()
    {
        return round(microtime(true) * 1000);
    }

    /**
    * Get milliseconds syntax sugar.
    *
    * @return float
    */
    public function getStartMilliseconds()
    {
        return $this->getMilliseconds();
    }

    /**
    * Get milliseconds syntax sugar.
    *
    * @return float
    */
    public function getEndMilliseconds()
    {
        return $this->getMilliseconds();
    }
}
