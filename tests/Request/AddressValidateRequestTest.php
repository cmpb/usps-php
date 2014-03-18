<?php

namespace Kohabi\USPS\Request;

class AddressValidateRequestTest extends \PHPUnit_Framework_TestCase
{
    private $request;

    protected function setUp()
    {
        $this->request = new AddressValidateRequest();
    }

    public function testRequiresUserid()
    {
        $this->assertEquals(true, $this->request->requiresUserid());
    }

    public function testRequiresPassword()
    {
        $this->assertEquals(false, $this->request->requiresPassword());
    }

    public function testSupportsSecure()
    {
        $this->assertEquals(false, $this->request->supportsSecure());
    }

    public function testSupportsProduction()
    {
        $this->assertEquals(true, $this->request->supportsProduction());
    }

    public function testGetRootElementName()
    {
        $this->assertEquals(
            'AddressValidateRequest',
            $this->request->getRootElementName()
        );
    }

    public function testGetApiName()
    {
        $this->assertEquals('Verify', $this->request->getApiName());
    }
}
