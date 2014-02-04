<?php

namespace Kohabi\USPS\Model;

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

    public function testGetAndSetContainer()
    {
        $this->package->setContainer('VARIABLE');
        $this->assertEquals('VARIABLE', $this->package->getContainer());
    }
}
