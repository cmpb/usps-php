<?php

namespace Kohabi\USPS\Tests\Request;

use Kohabi\USPS\Request\AddressValidateRequest;
use Kohabi\USPS\Model\Address;

class AddressValidateRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \Kohabi\USPS\Request\AddressValidateRequest
     */
    private $request;

    protected function setUp()
    {
        $this->request = new AddressValidateRequest();
    }

    public function testInterface()
    {
        $this->assertInstanceOf(
            '\Kohabi\USPS\Request\RequestInterface',
            $this->request
        );

        $this->assertTrue($this->request->requiresUserid());
        $this->assertFalse($this->request->requiresPassword());
        $this->assertFalse($this->request->supportsSecure());
        $this->assertTrue($this->request->supportsProduction());

        $this->assertEquals(
            'AddressValidateRequest',
            $this->request->getRootElementName()
        );

        $this->assertEquals('Verify', $this->request->getApiName());
    }

    public function testMapping()
    {
        $a = new Address();
        $a->setLine1('6406 Ivy Lane');
        $a->setLine2('Apt 3');
        $a->setCity('Greenbelt');
        $a->setState('MD');

        $this->request->addAddress($a);

        $expected = '<Address>' .
                        '<Address1>Apt 3</Address1>' .
                        '<Address2>6406 Ivy Lane</Address2>' .
                        '<City>Greenbelt</City>' .
                        '<State>MD</State>' .
                        '<Zip5></Zip5>' .
                        '<Zip4></Zip4>' .
                    '</Address>';

        $this->assertEquals($expected, $this->request->getXmlBody());
    }
}
