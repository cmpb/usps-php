<?php

namespace Kohabi\USPS\Mapper;

use Kohabi\USPS\Address;

class StandardizeAddressTest extends \PHPUnit_Framework_TestCase
{
    private $mapper;

    protected function setUp()
    {
        $this->mapper = new StandardizeAddressRequest();
    }

    public function testExample1()
    {
        $address = new Address();
        $address->addLine('6406 Ivy Lane');
        $address->setCity('Greenbelt');
        $address->setState('MD');
        $expected = '<AddressValidateRequest USERID="123">' .
                        '<Address>' .
                            '<Address1></Address1>' .
                            '<Address2>6406 Ivy Lane</Address2>' .
                            '<City>Greenbelt</City>' .
                            '<State>MD</State>' .
                            '<Zip5></Zip5>' .
                            '<Zip4></Zip4>' .
                        '</Address>' .
                    '</AddressValidateRequest>';
        $result = $this->mapper->map(123, $address);
        $this->assertEquals($expected, $result);
    }
}
