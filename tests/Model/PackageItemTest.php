<?php

namespace Kohabi\USPS\Tests\Model;

use Kohabi\USPS\Model\PackageItem;
use Kohabi\USPS\Model\Ounces;

class PackageItemTest extends \PHPUnit_Framework_TestCase
{
    private $item;

    protected function setUp()
    {
        $this->item = new PackageItem();
    }

    public function testInitialQuantity()
    {
        $this->assertEquals(1, $this->item->getQuantity());
    }

    public function testInitialWeight()
    {
        $this->assertEquals(0, $this->item->getWeight()->toOunces());
    }

    public function testDescription()
    {
        $this->item->setDescription('XYZ');
        $this->assertEquals('XYZ', $this->item->getDescription());
    }

    public function testQuantity()
    {
        $this->item->setQuantity(5);
        $this->assertEquals(5, $this->item->getQuantity());
    }

    public function testValue()
    {
        $this->item->setValue(55.00);
        $this->assertEquals(55.00, $this->item->getValue());
    }

    public function testTotalValue()
    {
        $this->item->setValue(5);
        $this->item->setQuantity(3);
        $this->assertEquals(15, $this->item->getTotalValue());
    }

    public function testWeight()
    {
        $weight = new Ounces(1);
        $this->item->setWeight($weight);
        $this->assertSame($weight, $this->item->getWeight());
    }

    public function testTotalWeight()
    {
        $weight = new Ounces(5);
        $this->item->setWeight($weight);
        $this->item->setQuantity(3);
        $this->assertEquals(15, $this->item->getTotalWeight()->toOunces());
    }

    public function testHSTariffNumber()
    {
        $this->item->setHSTariffNumber('132');
        $this->assertEquals('132', $this->item->getHSTariffNumber());
    }

    public function testCountryOfOrigin()
    {
        $this->item->setCountryOfOrigin('US');
        $this->assertEquals('US', $this->item->getCountryOfOrigin());
    }
}
