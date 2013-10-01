<?php

namespace Bowling\Exceptions;

/**
 * Class IllegalNumberOfPlayersException is thrown when attempting to set more players then it is allowed per alley
 * @copyright 2013 by MEV, LLC
 * @author Roman Kyrii <roman.kyrii@mev.com>
 * @package Bowling\Exceptions
 */
class IllegalNumberOfPlayersException extends \Exception
{
    public function __construct($message, $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}