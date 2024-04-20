<?php

namespace PG\Payment\Contracts;

use PG\Payment\Purchase;
use PG\Payment\Payload;
use PG\Payment\Verify;

interface Payment
{
    public function __construct(Payload $payload);

    public function purchase(): Purchase;

    public function verify(): Verify;
}