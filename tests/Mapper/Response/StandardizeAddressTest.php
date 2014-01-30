<?php

namespace Kohabi\USPS\Mapper\Response;

use Kohabi\USPS\ResponseParser;

class StandardizeAddressTest extends \PHPUnit_Framework_TestCase
{
    private $mapper;

    protected function setUp()
    {
        $this->mapper = new StandardizeAddress();
    }

    public function testExample1()
    {
        $xml = '<AddressValidateResponse>' .
                    '<Address ID="0">' .
                        '<Address2>6406 IVY LN</Address2>' .
                        '<City>GREENBELT</City>' .
                        '<State>MD</State>' .
                        '<Zip5>20770</Zip5>' .
                        '<Zip4>1440</Zip4>' .
                    '</Address>' .
               '</AddressValidateResponse>';
        $parser = new ResponseParser();
        $address = $this->mapper->map($parser->parse($xml));
        $this->assertEquals('6406 IVY LN', $address->getLine1());
        $this->assertEquals('GREENBELT', $address->getCity());
        $this->assertEquals('MD', $address->getState());
        $this->assertEquals('20770', $address->getZip5());
        $this->assertEquals('1440', $address->getZip4());
    }
}
