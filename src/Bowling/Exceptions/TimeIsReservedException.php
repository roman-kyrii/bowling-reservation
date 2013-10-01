<?php

namespace Bowling\Exceptions;

/**
 * Class TimeIsReservedException is thrown when attempting to create reservation at reserved date
 * @copyright 2013 by MEV, LLC
 * @author Roman Kyrii <roman.kyrii@mev.com>
 * @package Bowling\Exceptions
 */
class TimeIsReservedException extends \Exception
{
    public function __construct($message, $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}