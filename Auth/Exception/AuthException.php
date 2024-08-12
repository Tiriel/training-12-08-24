<?php

namespace Auth\Exception;

class AuthException extends \Exception
{
    public function __construct(string $login)
    {
        parent::__construct(sprintf('Authentication failed for login "%s"', $login));
    }
}
