php-usps
========

The USPS WebTools Client API implemented in PHP

### Example Usage
```php
$usps = new Kohabi\USPS\API(
	new Guzzle\Http\Client(),
	'123USER',
	$testing = true
);

$address = new Kohabi\USPS\Address();
$address->setLine1('6406 Ivy Lane');
$address->setCity('Greenbelt');
$address->setState('MD');

$result = $usps->standardizeAddress($address);

echo $result->getLine1(); // 6406 IVY LN
echo $result->getCity(); // GREENBELT
echo $result->getState(); // MD
echo $result->getZip5(); // 20770
echo $result->getZip4(); // 1440
```
