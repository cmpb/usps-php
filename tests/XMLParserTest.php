<?php

namespace Kohabi\USPS;

class XMLParserTest extends \PHPUnit_Framework_TestCase
{
    private $xmlParser;

    protected function setUp()
    {
        $this->xmlParser = new XMLParser();
    }

    public function testExample1()
    {
        $response = '<AddressValidateResponse>
                        <Address ID="0">
                            <FirmName>XYZ Corp.</FirmName>
                            <Address2>6406 IVY LN</Address2>
                            <City>GREENBELT</City>
                            <State>MD</State>
                            <Zip5>20770</Zip5>
                            <Zip4>1441</Zip4>
                        </Address>
                    </AddressValidateResponse>';
        
        $res = $this->xmlParser->parse($response);
        
        $this->assertEquals('0', $res->Address['ID']);
        $this->assertEquals('XYZ Corp.', $res->Address->FirmName);
        $this->assertEquals('6406 IVY LN', $res->Address->Address2);
        $this->assertEquals('GREENBELT', $res->Address->City);
        $this->assertEquals('MD', $res->Address->State);
        $this->assertEquals('20770', $res->Address->Zip5);
        $this->assertEquals('1441', $res->Address->Zip4);
    }
}
