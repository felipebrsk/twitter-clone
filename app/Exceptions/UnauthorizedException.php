<?php

namespace App\Exceptions;

class UnauthorizedException extends StatusCodeException
{
    /**
     *  Response error code.
     * 
     *  @var int
     */

    protected $statusCode = 401;
}
