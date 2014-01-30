<?php

namespace Kohabi\USPS;

class AddressTest extends \PHPUnit_Framework_TestCase
{
    private $address;

    protected function setUp()
    {
        $this->address = new Address();
    }

    public function testCompany()
    {
        $company = 'ABC Company';
        $this->address->setCompany($company);
        $this->assertEquals($company, $this->address->getCompany());
    }

    public function testFullName()
    {
        $name = 'John Carter';
        $this->address->setFullName($name);
        $this->assertEquals($name, $this->address->getFullName());
    }

    public function testFirstName()
    {
        $name = 'John';
        $this->address->setFirstName($name);
        $this->assertEquals($name, $this->address->getFirstName());
    }

    public function testLastName()
    {
        $name = 'Carter';
        $this->address->setLastName($name);
        $this->assertEquals($name, $this->address->getLastName());
    }

    public function testGetFullName()
    {
        $firstName = 'John';
        $lastName = 'Carter';
        $fullName = $firstName . ' ' . $lastName;
        $this->address->setFirstName($firstName);
        $this->address->setLastName($lastName);
        $this->assertEquals($fullName, $this->address->getFullName());
    }

    public function testLines()
    {
        $lines = array('Line 1', 'Line 2');
        $this->address->setLines($lines);
        $this->assertEquals($lines, $this->address->getLines());
    }

    public function testAddLines()
    {
        $lines = array('Line 1', 'Line 2');
        foreach ($lines as $line) {
            $this->address->addLine($line);
        }
        $this->assertEquals($lines, $this->address->getLines());
        for ($i = 0; $i < count($lines); $i++) {
            $this->assertEquals($lines[$i], $this->address->getLine($i));
        }
    }

    public function testGetNonexistentLine()
    {
        $this->assertSame(null, $this->address->getLine(5));
    }

    public function testSetLine()
    {
        $this->address->setLine(0, 'Line1');
        $this->address->setLine(1, 'Line2');
        $this->address->setLine(2, 'Line3');
        $expected = array('Line1', 'Line2', 'Line3');
        $actual = $this->address->getLines();
        $this->assertEquals($expected, $actual);
    }

    public function testGetAndSetLine1()
    {
        $line1 = '123 Real St';
        $this->address->setLine1($line1);
        $this->assertEquals($line1, $this->address->getLine1());
        $this->address->setLines(array($line1));
        $this->assertEquals($line1, $this->address->getLine1());
    }

    public function testGetAndSetLine2()
    {
        $line2 = '123 Real St';
        $this->address->setLine2($line2);
        $this->assertEquals($line2, $this->address->getLine2());
        $this->address->setLines(array('Line 1', $line2));
        $this->assertEquals($line2, $this->address->getLine2());
    }

    public function testState()
    {
        $state = 'California';
        $this->address->setState($state);
        $this->assertEquals($state, $this->address->getState());
    }

    public function testProvince()
    {
        $province = 'Province';
        $this->address->setProvince($province);
        $this->assertEquals($province, $this->address->getProvince());
    }

    public function testStateAndProvinceAreSame()
    {
        $state = 'California';
        $this->address->setState($state);
        $this->assertEquals($state, $this->address->getProvince());
    }

    public function testCity()
    {
        $city = 'LA';
        $this->address->setCity($city);
        $this->assertEquals($city, $this->address->getCity());
    }

    public function testPostalCode()
    {
        $postalCode = '5555';
        $this->address->setPostalCode($postalCode);
        $this->assertEquals($postalCode, $this->address->getPostalCode());
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

    public function testSetZip5AndZip4AndGetPostalCode()
    {
        $this->address->setZip5('12345');
        $this->address->setZip4('1234');
        $this->assertEquals('12345-1234', $this->address->getPostalCode());
    }
}
