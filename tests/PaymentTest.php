<?php

use PHPUnit\Framework\TestCase;

use PG\Payment\Purchase;
use PG\Payment\Payload;
use PG\Payment\Verify;

class PaymentTest extends TestCase
{
    public function testPayloadIdCanBeSetted()
    {
        $identity = Payload::make()
            ->setId(100)->getId();

        $this->assertSame($identity, 100);
    }

    public function testPayloadAmountCanBeSetted()
    {
        $amount = Payload::make()
            ->setAmount(1000)->getAmount();

        $this->assertSame($amount, 1000);
    }

    public function testPayloadTokenCanBeSetted()
    {
        $token = Payload::make()
            ->setToken('test')->getToken();

        $this->assertSame($token, 'test');
    }

    public function testPayloadBackUrlCanBeSetted()
    {
        $backUrl = Payload::make()
            ->setBackUrl('https://')->getBackUrl();

        $this->assertSame($backUrl, 'https://');
    }

    public function testPayloadReferenceCanBeSetted()
    {
        $reference = Payload::make()
            ->setReference('test')->getReference();

        $this->assertSame($reference, 'test');
    }

    public function testPurchaseAddressCanBeSetted()
    {
        $address = Purchase::make()
            ->setAddress('https://')->getAddress();

        $this->assertSame($address, 'https://');
    }

    public function testPurchaseReferenceCanBeSetted()
    {
        $reference = Purchase::make()
            ->setReference('test')->getReference();

        $this->assertSame($reference, 'test');
    }

    public function testVerifyReferenceCanBeSetted()
    {
        $reference = Verify::make()
            ->setReference('test')->getReference();

        $this->assertSame($reference, 'test');
    }
}