<?php

namespace Kohabi\USPS\Tests\Model;

use Kohabi\USPS\Model\Package;
use Kohabi\USPS\Model\PackageItem;

class PackageTest extends \PHPUnit_Framework_TestCase
{
    private $package;

    protected function setUp()
    {
        $this->package = new Package();
    }

    public function testAddItemAndGetItem()
    {
        $item = new PackageItem();
        $this->package->addItem($item);
        $this->assertEquals($item, $this->package->getItem(0));
    }

    public function testGetNumberOfItems()
    {
        $this->assertEquals(0, $this->package->getNumberOfItems());
        $this->package->addItem(new PackageItem());
        $this->assertEquals(1, $this->package->getNumberOfItems());
    }

    public function testSetInvalidContainer()
    {
        $this->setExpectedException(
            'InvalidArgumentException',
            'Invalid Container'
        );

        $this->package->setContainer('abc');
    }

    public function testSetAndGetContainer()
    {
        $this->package->setContainer('VARIABLE');
        $this->assertEquals('VARIABLE', $this->package->getContainer());
    }

    public function testSetInvalidSize()
    {
        $this->setExpectedException(
            'InvalidArgumentException',
            'Invalid Size'
        );

        $this->package->setSize('A');
    }

    public function testSetAndGetSize()
    {
        $this->package->setSize('REGULAR');
        $this->assertEquals('REGULAR', $this->package->getSize());
    }

    public function testSetAndGetLength()
    {
        $this->package->setLength(5);
        $this->assertEquals(5, $this->package->getLength());
    }

    public function testSetAndGetHeight()
    {
        $this->package->setHeight(5);
        $this->assertEquals(5, $this->package->getHeight());
    }

    public function testSetAndGetGirth()
    {
        $this->package->setGirth(5);
        $this->assertEquals(5, $this->package->getGirth());
    }
}
