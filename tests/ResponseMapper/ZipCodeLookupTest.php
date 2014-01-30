<?php

namespace Kohabi\USPS\ResponseMapper;

use Kohabi\USPS\XMLParser;

class ZipCodeLookupTest extends \PHPUnit_Framework_TestCase
{
    private $mapper;
    private $xmlParser;

    protected function setUp()
    {
        $this->mapper = new ZipCodeLookup();
        $this->xmlParser = new XMLParser();
    }

    public function testExample1()
    {
        $response = '<ZipCodeLookupResponse>' .
                    '<Address ID="0">' .
                    '<Address2>6406 IVY LN</Address2>' .
                    '<City>GREENBELT</City>' .
                    '<State>MD</State>' .
                    '<Zip5>20770</Zip5>' .
                    '<Zip4>1440</Zip4>' .
                    '</Address>' .
                    '</ZipCodeLookupResponse>';

        $data = $this->xmlParser->parse($response);

        $address = $this->mapper->map($data);

        $this->assertEquals('6406 IVY LN', $address->getLine1());
        $this->assertEquals('GREENBELT', $address->getCity());
        $this->assertEquals('MD', $address->getState());
        $this->assertEquals('20770', $address->getZip5());
        $this->assertEquals('1440', $address->getZip4());
    }
}
