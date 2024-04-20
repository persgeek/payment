<?php

namespace PG\Payment\Gateways;

use PG\Payment\Exceptions\PaymentException;
use PG\Payment\Contracts\Payment;
use PG\Payment\Purchase;
use PG\Payment\Payload;
use PG\Payment\Verify;
use GuzzleHttp\Client;

class Zibal implements Payment
{
    const PURCHASE_URL = 'https://gateway.zibal.ir/v1/request';

    const GATEWAY_URL = 'https://gateway.zibal.ir/start/';

    const VERIFY_URL = 'https://gateway.zibal.ir/v1/verify';

    protected $payload;

    public function __construct(Payload $payload)
    {
        $this->payload = $payload;
    }
    
    public function purchase(): Purchase
    {
        $client = new Client;

        $params = [
            'merchant' => $this->payload->getToken(), 'orderId' => $this->payload->getId(), 'amount' => $this->payload->getRial(), 'callbackUrl' => $this->payload->getBackUrl()
        ];

        $response = $client->post(static::PURCHASE_URL, ['json' => $params])
            ->getBody()->getContents();

        $response = json_decode($response);

        if (empty($response)) {

            throw new PaymentException('Could not get response');
        }

        $status = $response->result;

        if ($status <> 100) {

            throw new PaymentException($status);
        }

        return Purchase::make()->setAddress(static::GATEWAY_URL)
            ->setReference($response->trackId);
    }

    public function verify(): Verify
    {
        $client = new Client;

        $params = [
            'merchant' => $this->payload->getToken(), 'trackId' => $this->payload->getReference()
        ];

        $response = $client->post(static::VERIFY_URL, ['json' => $params])
            ->getBody()->getContents();

        $response = json_decode($response);

        if (empty($response)) {

            throw new PaymentException('Could not get response');
        }

        $status = $response->result;

        if ($status <> 100) {

            throw new PaymentException($status);
        }

        return Verify::make()
            ->setReference($response->refNumber);
    }
}