<?php

namespace Kohabi\USPS\Tests\Model;

use Kohabi\USPS\Model\Address;
use Kohabi\USPS\Model\Fullname;

class AddressTest extends \PHPUnit_Framework_TestCase
{
    private $address;

    protected function setUp()
    {
        $this->address = new Address();
    }

    public function testCompany()
    {
        $this->address->setCompany('XYZ Corp');
        $this->assertEquals('XYZ Corp', $this->address->getCompany());
    }

    public function testRecipient()
    {
        $name = new Fullname('Jon Snow');
        $this->address->setRecipient($name);
        $this->assertSame($name, $this->address->getRecipient());
    }

    public function testArrayAccess()
    {
        $this->address[] = '123 Oxy Rd';
        $this->address[] = 'Apt 3';

        $this->assertEquals('123 Oxy Rd', $this->address[0]);
        $this->assertEquals('Apt 3', $this->address[1]);
    }

    public function testLine1()
    {
        $this->address->setLine1('123 Oxy Rd');
        $this->assertEquals('123 Oxy Rd', $this->address->getLine1());
        $this->assertEquals('123 Oxy Rd', $this->address[0]);
    }

    public function testLine2()
    {
        $this->address->setLine2('Apt 3');
        $this->assertEquals('Apt 3', $this->address->getLine2());
        $this->assertEquals('Apt 3', $this->address[1]);
    }

    public function testState()
    {
        $this->address->setState('CA');
        $this->assertEquals('CA', $this->address->getState());
    }

    public function testProvince()
    {
        $this->address->setProvince('CA');
        $this->assertEquals('CA', $this->address->getProvince());
    }

    public function testStateAndProvinceAreSame()
    {
        $this->address->setState('CA');
        $this->assertEquals('CA', $this->address->getProvince());
    }

    public function testCity()
    {
        $this->address->setCity('LA');
        $this->assertEquals('LA', $this->address->getCity());
    }

    public function testPostalCode()
    {
        $this->address->setPostalCode('12345');
        $this->assertEquals('12345', $this->address->getPostalCode());
    }

    public function testGetZip5()
    {
        $this->address->setPostalCode('94521-1234');
        $this->assertEquals('94521', $this->address->getZip5());
    }

    public function testGetZip4()
    {
        $this->address->setPostalCode('94521-1234');
        $this->assertEquals('1234', $this->address->getZip4());
    }

    public function testSetZip5()
    {
        $this->address->setZip5('12345');
        $this->assertEquals('12345', $this->address->getZip5());
        $this->assertEquals('12345', $this->address->getPostalCode());
    }

    public function testSetZip4()
    {
        $this->address->setZip4('1234');
        $this->assertEquals('1234', $this->address->getZip4());
        $this->assertEquals(null, $this->address->getPostalCode());
    }

    public function testGetPostalCode()
    {
        $this->address->setZip5('12345');
        $this->address->setZip4('1234');
        $this->assertEquals('12345-1234', $this->address->getPostalCode());
    }
}
