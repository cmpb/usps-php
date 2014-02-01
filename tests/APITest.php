<?php

namespace Kohabi\USPS;

use Kohabi\USPS\Model\Address;

class APITest extends \PHPUnit_Framework_TestCase
{
    private $api;

    protected function setUp()
    {
        $userid = getenv('USPS_USER');
        $client = new \Guzzle\Http\Client();
        $client->setSslVerification(true, true, 2);
        $this->api = new API($client, $userid, $testing = true);
    }

    public function testStandardizeAddress()
    {
        $address = new Address();
        $address->setLine1('6406 Ivy Lane');
        $address->setCity('Greenbelt');
        $address->setState('MD');
        $res = $this->api->standardizeAddress($address);
        $this->assertEquals('6406 IVY LN', $res->getLine1());
        $this->assertEquals('GREENBELT', $res->getCity());
        $this->assertEquals('MD', $res->getState());
        $this->assertEquals('20770-1441', $res->getPostalCode());
    }

    public function testZipCodeLookup()
    {
        $this->markTestIncomplete('API Code Not Recognized');
        $address = new Address();
        $address->setLine1('6406 Ivy Lane');
        $address->setCity('Greenbelt');
        $address->setState('MD');

        $result = $this->api->zipCodeLookup($address);

        $this->assertEquals('6406 IVY LN', $result->getLine1());
        $this->assertEquals('GREENBELT', $result->getCity());
        $this->assertEquals('MD', $result->getState());
        $this->assertEquals('20770', $result->getZip5());
        $this->assertEquals('1440', $result->getZip4());
    }
}
