<?php

namespace Kohabi\USPS;

class ResponseParserTest extends \PHPUnit_Framework_TestCase
{
    private $parser;

    protected function setUp()
    {
        $this->parser = new ResponseParser();
    }

    /**
     * @expectedException Kohabi\USPS\APIException
     * @expectedExceptionMessage Error Description
     * @expectedExceptionCode 11
     */
    public function testAPIError()
    {
        $response = '<Error>
                        <Number>11</Number>
                        <Description>Error Description</Description>
                     </Error>';
        $this->parser->parse($response);
    }

    public function testAddressResponse()
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
        $res = $this->parser->parse($response);
        $this->assertEquals('0', $res->Address['ID']);
        $this->assertEquals('XYZ Corp.', $res->Address->FirmName);
        $this->assertEquals('6406 IVY LN', $res->Address->Address2);
        $this->assertEquals('GREENBELT', $res->Address->City);
        $this->assertEquals('MD', $res->Address->State);
        $this->assertEquals('20770', $res->Address->Zip5);
        $this->assertEquals('1441', $res->Address->Zip4);
    }
}
