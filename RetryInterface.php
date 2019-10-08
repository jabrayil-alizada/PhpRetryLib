<?php

namespace Retry;

interface RetryInterface {

    public function retry(int $currentRetry, int $lastRetryTimestamp = 0) : bool;

}