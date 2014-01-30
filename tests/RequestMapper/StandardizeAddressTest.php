<?php

namespace Kohabi\USPS\RequestMapper;

use Kohabi\USPS\Address;

class StandardizeAddressTest extends \PHPUnit_Framework_TestCase
{
    private $mapper;

    protected function setUp()
    {
        $this->mapper = new StandardizeAddress();
    }

    public function testExample1()
    {
        $expected = '<AddressValidateRequest USERID="123">' .
                        '<Address>' .
                            '<Address1>Apt 3</Address1>' .
                            '<Address2>6406 Ivy Lane</Address2>' .
                            '<City>Greenbelt</City>' .
                            '<State>MD</State>' .
                            '<Zip5></Zip5>' .
                            '<Zip4></Zip4>' .
                        '</Address>' .
                    '</AddressValidateRequest>';

        $address = new Address();
        $address->setLine1('6406 Ivy Lane');
        $address->setLine2('Apt 3');
        $address->setCity('Greenbelt');
        $address->setState('MD');

        $result = $this->mapper->map(123, $address);

        $this->assertEquals($expected, $result);
    }
}
