<?php

namespace Kohabi\USPS\Model;

class PackageItemTest extends \PHPUnit_Framework_TestCase
{
    private $item;

    protected function setUp()
    {
        $this->item = new PackageItem();
    }

    public function testInitialValues()
    {
        $this->assertEquals(1, $this->item->getQuantity());
        $this->assertEquals(0, $this->item->getValue());
        $this->assertEquals(0, $this->item->getTotalValue());
        $this->assertEquals(0, $this->item->getWeightInPounds());
        $this->assertEquals(0, $this->item->getWeightInOunces());
        $this->assertEquals(
            array(0,0),
            $this->item->getWeightAsRational()
        );
        $this->assertEquals(0, $this->item->getTotalWeightInPounds());
        $this->assertEquals(0, $this->item->getTotalWeightInOunces());
        $this->assertEquals(
            array(0,0),
            $this->item->getTotalWeightAsRational()
        );
    }

    public function testSetAndGetDescription()
    {
        $this->item->setDescription('XYZ');
        $this->assertEquals('XYZ', $this->item->getDescription());
    }

    public function testSetAndGetQuantity()
    {
        $this->item->setQuantity(5);
        $this->assertEquals(5, $this->item->getQuantity());
    }

    public function testSetAndGetValue()
    {
        $this->item->setValue(55.00);
        $this->assertEquals(55.00, $this->item->getValue());
    }

    public function testGetTotalValue()
    {
        $this->item->setValue(5);
        $this->item->setQuantity(3);
        $this->assertEquals(15, $this->item->getTotalValue());
    }

    public function testSetAndGetWeightInPounds()
    {
        $this->item->setWeightInPounds(5);
        $this->assertEquals(5, $this->item->getWeightInPounds());
    }

    public function testSetAndGetWeightInOunces()
    {
        $this->item->setWeightInOunces(5);
        $this->assertEquals(5, $this->item->getWeightInOunces());
    }

    public function testSetWeightInPoundsAndGetWeightInOunces()
    {
        $this->item->setWeightInPounds(5);
        $this->assertEquals(80, $this->item->getWeightInOunces());
    }

    public function testSetWeightInOuncesAndGetWeightInPounds()
    {
        $this->item->setWeightInOunces(80);
        $this->assertEquals(5, $this->item->getWeightInPounds());
    }

    public function testGetTotalWeightInPounds()
    {
        $this->item->setWeightInPounds(5);
        $this->item->setQuantity(3);
        $this->assertEquals(15, $this->item->getTotalWeightInPounds());
    }

    public function testGetTotalWeightInOunces()
    {
        $this->item->setWeightInOunces(5);
        $this->item->setQuantity(3);
        $this->assertEquals(15, $this->item->getTotalWeightInOunces());
    }

    public function testGetWeightAsRational1()
    {
        $this->item->setWeightInPounds(5.75);
        list($pounds, $ounces) = $this->item->getWeightAsRational();
        $this->assertEquals(5, $pounds);
        $this->assertEquals(12, $ounces);
    }

    public function testGetWeightAsRational2()
    {
        $this->item->setWeightInOunces(12);
        list($pounds, $ounces) = $this->item->getWeightAsRational();
        $this->assertEquals(0, $pounds);
        $this->assertEquals(12, $ounces);
    }

    public function testGetTotalWeightAsRational1()
    {
        $this->item->setQuantity(3);
        $this->item->setWeightInPounds(5.75);
        list($pounds, $ounces) = $this->item->getTotalWeightAsRational();
        $this->assertEquals(17, $pounds);
        $this->assertEquals(4, $ounces);
    }

    public function testGetTotalWeightAsRational2()
    {
        $this->item->setQuantity(3);
        $this->item->setWeightInOunces(12);
        list($pounds, $ounces) = $this->item->getTotalWeightAsRational();
        $this->assertEquals(2, $pounds);
        $this->assertEquals(4, $ounces);
    }

    public function testSetAndGetHSTariffNumber()
    {
        $this->item->setHSTariffNumber('132');
        $this->assertEquals('132', $this->item->getHSTariffNumber());
    }

    public function testSetAndGetCountryOfOrigin()
    {
        $this->item->setCountryOfOrigin('US');
        $this->assertEquals('US', $this->item->getCountryOfOrigin());
    }
}
