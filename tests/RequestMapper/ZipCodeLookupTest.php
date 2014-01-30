<?php

namespace Kohabi\USPS\RequestMapper;

use Kohabi\USPS\Address;

class ZipCodeLookupTest extends \PHPUnit_Framework_TestCase
{
    private $mapper;

    protected function setUp()
    {
        $this->mapper = new ZipCodeLookup();
    }

    public function testExample1()
    {
        $expected = '<ZipCodeLookupRequest USERID="123USER">' .
                        '<Address>' .
                            '<Address1>Apt 3</Address1>' .
                            '<Address2>6406 Ivy Lane</Address2>' .
                            '<City>Greenbelt</City>' .
                            '<State>MD</State>' .
                        '</Address>' .
                    '</ZipCodeLookupRequest>';

        $address = new Address();
        $address->setLine1('6406 Ivy Lane');
        $address->setLine2('Apt 3');
        $address->setCity('Greenbelt');
        $address->setState('MD');

        $actual = $this->mapper->map('123USER', $address);

        $this->assertEquals($expected, $actual);
    }
}
