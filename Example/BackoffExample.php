<?php

namespace Retry\Example;

use Retry\Exception\MaxRetry;
use Retry\RetryFactory;

$backoffConfig = [
    "strategy" => RetryFactory::BACKOFF,
    "params" => [
        "factor" => 2,
        "delay" => 10,
        "retries" => 3,
    ],
    "current_retry" => 0,
    "last_retry_ts" => 0
];

$retry = RetryFactory::create($backoffConfig["strategy"], $backoffConfig["params"]);

while(true)
{
    try {
        if($retry->retry($backoffConfig['current_retry'], $backoffConfig['last_retry_ts']))
        {
            // Some logic that have to be repeated
            // ...
            // ...
            // ...
            // ...
            // ...

            // Update config
            $backoffConfig["last_retry_ts"] = (new \DateTimeImmutable('now'))
                ->getTimestamp();
            $backoffConfig["current_retry"]++;
        }
        else
        {
            // Wait time has not passed yet
        }
    }
    catch (MaxRetry $exception)
    {
        // Some logic

        // And break loop;
        break;
    }
}
