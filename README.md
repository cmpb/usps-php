kohabi/usps
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

### Running Tests

Tests are written using PHPUnit.

Remote tests depend on Guzzle and a USPS account.

You will need an account with given privileges for each API and secure server.

Tests read the USPS_USER environment variable to find the userid.

```bash
# example API test
USPS_USER='MY_USER' phpunit tests/APITest
```

### Running PHP_CodeSniffer

The project is written using PSR1 & PSR2 standards.

```bash
# checking src files
phpcs --standard=PSR1,PSR2 src/
# checking test files
phpcs --standard=PSR1,PSR2 tests/
```

### Implemented APIs

- Address Information
	- Address Standardization/Verification

	  ```php
	  $usps->standardizeAddress($address);
	  ```
