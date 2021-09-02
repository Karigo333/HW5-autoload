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

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    public function doLogic()
    {
        $a = 8;
        $b = 10;

        $c = $this->sum($a, $b);
    }

    protected function sum($a, $b)
    {
        return $a + $b;
    }
}