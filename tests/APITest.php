<?php

namespace Kohabi\USPS;

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
}
