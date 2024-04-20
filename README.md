# PHP Payment Gateway
You can utilize this PHP library for seamless integration with various payment gateways.

### How to install

```php
composer require persgeek/payment
```

### How to purchase
```php
use PG\Payment\Gateways\Zibal;
use PG\Payment\Payload;

$payload = Payload::make()
    ->setBackUrl('http://localhost')
    ->setToken('YOUR_MERCHANT')
    ->setAmount(50000)
    ->setId(100);

$response = (new Zibal($payload))
    ->purchase();

print_r($response);
```


### How to verify
```php
use PG\Payment\Gateways\Zibal;
use PG\Payment\Payload;

$payload = Payload::make()
    ->setReference('YOUR_REFERENCE')
    ->setToken('YOUR_MERCHANT');

$response = (new Zibal($payload))
    ->verify();

print_r($response);
```

### Supported gateways
- Zibal