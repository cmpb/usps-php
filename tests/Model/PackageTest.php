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

    public function testInitialCount()
    {
        $this->assertEquals(0, count($this->package));
    }

    public function testCountConsidersQuantity()
    {
        $a = new PackageItem();
        $a->setQuantity(3);
        $b = new PackageItem();
        $b->setQuantity(2);
        $this->package->addItem($a);
        $this->package->addItem($b);
        $this->assertEquals(5, count($this->package));
    }

    public function testInvalidContainer()
    {
        $this->setExpectedException(
            'InvalidArgumentException',
            'Invalid Container'
        );

        $this->package->setContainer('abc');
    }

    public function testValidContainer()
    {
        $this->package->setContainer('VARIABLE');
        $this->assertEquals('VARIABLE', $this->package->getContainer());
    }

    public function testInvalidSize()
    {
        $this->setExpectedException(
            'InvalidArgumentException',
            'Invalid Size'
        );

        $this->package->setSize('A');
    }

    public function testValidSize()
    {
        $this->package->setSize('REGULAR');
        $this->assertEquals('REGULAR', $this->package->getSize());
    }

    public function testLength()
    {
        $this->package->setLength(5);
        $this->assertEquals(5, $this->package->getLength());
    }

    public function testHeight()
    {
        $this->package->setHeight(5);
        $this->assertEquals(5, $this->package->getHeight());
    }

    public function testGirth()
    {
        $this->package->setGirth(5);
        $this->assertEquals(5, $this->package->getGirth());
    }
}
