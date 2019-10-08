<?php

namespace Retry;

use Retry\Exception\RetryException;

class RetryFactory {

    const DIRECTLY = 'directly';

    const PAUSE = 'pause';

    const BACKOFF = 'backoff';

    public static function create(
        string $retryType,
        array $params
    )
    {
        switch ($retryType){
            case self::DIRECTLY:
                return new Directly($params);
                break;
            case self::PAUSE:
                return new Pause($params);
                break;
            case self::BACKOFF:
                return new Backoff($params);
                break;
            default:
                throw RetryException::NotAllowedRetryType();
        }
    }
}