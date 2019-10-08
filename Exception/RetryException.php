<?php

namespace Retry\Exception;


abstract class RetryException extends \RuntimeException
{
    static public function MaxRetry(): MaxRetry
    {
        return new MaxRetry();
    }

    static public function NotAllowedRetryType(): NotAllowedRetryType
    {
        return new NotAllowedRetryType();
    }
}