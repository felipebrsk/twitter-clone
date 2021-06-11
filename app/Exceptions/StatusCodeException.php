<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class StatusCodeException extends Exception implements HttpExceptionInterface
{
    /**
     *  Response status code.
     * 
     *  @var int
     */

    protected $statusCode;

    /**
     *  Response headers.
     *  
     *  @var array
     */

    protected $headers = [];

    /**
     *  Exception message.
     * 
     *  @var string
     */

    protected $message;

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }
}
