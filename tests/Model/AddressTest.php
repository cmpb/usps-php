<?php

namespace Kohabi\USPS\Model;

class AddressTest extends \PHPUnit_Framework_TestCase
{
    private $address;

    protected function setUp()
    {
        $this->address = new Address();
    }

    public function testSetAndGetCompany()
    {
        $this->address->setCompany('XYZ Corp');
        $this->assertEquals('XYZ Corp', $this->address->getCompany());
    }

    public function testSetAndGetFirstName()
    {
        $this->address->setFirstName('John');
        $this->assertEquals('John', $this->address->getFirstName());
    }

    public function testSetAndGetLastName()
    {
        $this->address->setLastName('Doe');
        $this->assertEquals('Doe', $this->address->getLastName());
    }

    public function testSetAndGetName()
    {
        $this->address->setName('John Doe');
        $this->assertEquals('John Doe', $this->address->getName());
    }

    public function testSetFirstAndLastAndGetName()
    {
        $this->address->setFirstName('John');
        $this->address->setLastName('Doe');
        $this->assertEquals('John Doe', $this->address->getName());
    }

    public function testSetAndGetLines()
    {
        $this->address->setLines(array('A', 'B'));
        $this->assertEquals(array('A', 'B'), $this->address->getLines());
    }

    public function testAddLineAndGetLinesAndGetLine()
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

    public function testSetLineAndGetLines()
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

    public function testSetAndGetState()
    {
        $this->address->setState('CA');
        $this->assertEquals('CA', $this->address->getState());
    }

    public function testSetAndGetProvince()
    {
        $this->address->setProvince('CA');
        $this->assertEquals('CA', $this->address->getProvince());
    }

    public function testSetStateAndGetProvince()
    {
        $this->address->setState('CA');
        $this->assertEquals('CA', $this->address->getProvince());
    }

    public function testSetAndGetCity()
    {
        $this->address->setCity('LA');
        $this->assertEquals('LA', $this->address->getCity());
    }

    public function testSetAndGetPostalCode()
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

    public function testSetZip5AndZip4AndGetPostalCode()
    {
        $this->address->setZip5('12345');
        $this->address->setZip4('1234');
        $this->assertEquals('12345-1234', $this->address->getPostalCode());
    }
}
