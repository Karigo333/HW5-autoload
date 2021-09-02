<?php

namespace App\Services;

use Exception;

class Email
{
    private $value;

    public function __construct($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('invalid mail');
        }

        $this->value = $value;
    }

