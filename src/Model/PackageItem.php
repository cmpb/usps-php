<?php

namespace Kohabi\USPS\Model;

class PackageItem
{
    private $description;
    private $quantity = 1;
    private $value;
    private $ounces;

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getTotalValue()
    {
        return $this->getQuantity() * $this->getValue();
    }

    public function setWeightInPounds($pounds)
    {
        $this->ounces = $pounds * 16;
    }

    public function getWeightInPounds()
    {
        return $this->ounces / 16;
    }

    public function setWeightInOunces($ounces)
    {
        $this->ounces = $ounces;
    }

    public function getWeightInOunces()
    {
        return $this->ounces;
    }

    public function getTotalWeightInPounds()
    {
        return $this->getWeightInPounds() * $this->getQuantity();
    }

    public function getTotalWeightInOunces()
    {
        return $this->getWeightInOunces() * $this->getQuantity();
    }

    public function getWeightAsRational()
    {
        $pounds = floor($this->getWeightInPounds());
        $ounces = $this->getWeightInOunces() % 16;
        return array($pounds, $ounces);
    }

    public function getTotalWeightAsRational()
    {
        $pounds = floor($this->getTotalWeightInPounds());
        $ounces = $this->getTotalWeightInOunces() % 16;
        return array($pounds, $ounces);
    }
}
