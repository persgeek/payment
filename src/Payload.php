<?php

namespace PG\Payment;

class Payload
{
    protected $id;

    protected $token;

    protected $amount;

    protected $backUrl;

    protected $reference;

    public static function make()
    {
        return new static();
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
        
        return $this;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getRial()
    {
        return ($this->amount * 10);
    }

    public function setBackUrl($url)
    {
        $this->backUrl = $url;

        return $this;
    }

    public function getBackUrl()
    {
        return $this->backUrl;
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