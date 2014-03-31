<?php

namespace Kohabi\USPS\Tests\Client;

use Kohabi\USPS\Model\Address;

abstract class AbstractClientTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Kohabi\USPS\Client\ClientInterface
     */
    private $client;

    /**
     * @return \Kohabi\USPS\Client\ClientInterface
     */
    abstract protected function createClient();

    protected function setUp()
    {
        $this->client = $this->createClient();
    }

    public function testClientInterface()
    {
        $this->assertInstanceOf(
            '\Kohabi\USPS\Client\ClientInterface',
            $this->client
        );
    }

    public function testStandardizeAddress()
    {
        $a = new Address();
        $a->setLine1('6406 Ivy Lane');
        $a->setCity('Greenbelt');
        $a->setState('MD');

        $b = $this->client->standardizeAddress($a);

        $this->assertEquals('6406 IVY LN', $b->getLine1());
        $this->assertEquals('GREENBELT', $b->getCity());
        $this->assertEquals('MD', $b->getState());
        $this->assertEquals('20770-1441', $b->getPostalCode());
    }
}
