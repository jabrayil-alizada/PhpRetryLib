<?php

namespace Retry;

use Retry\Exception\RetryException;

class Directly implements RetryInterface {

    /**
     * @var array
     */
    protected $_params;

    /**
     * Directly constructor.
     * @param array $_params
     */
    public function __construct(array $_params)
    {
        $this->_params = $_params;
    }

    public function retry(int $currentRetry, int $lastRetryTimestamp = 0) : bool
    {
        if(!($currentRetry < $this->_params["retries"]))
        {
            throw RetryException::MaxRetry();
        }
        else
        {
            return TRUE;
        }
    }
}