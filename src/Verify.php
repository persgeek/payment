<?php

namespace PG\Payment;

class Verify
{
    protected $reference;

    public static function make()
    {
        return new static();
    }

    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    public function getReference()
    {
        return $this->reference;
    }
}