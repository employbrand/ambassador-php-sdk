<?php

namespace EmploybrandAmbassador\Exceptions\Http;

use Exception;


class Unauthenticated extends Exception
{

    /**
     * @param string $message
     */
    public function __construct(string $message = "Authentication failed.")
    {
        parent::__construct($message);
    }
}
