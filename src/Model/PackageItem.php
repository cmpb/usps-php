<?php

namespace Kohabi\USPS\Model;

class PackageItem
{
    private $description;
    private $quantity;
    private $value;
    private $weight;
    private $hsTariffNumber;
    private $countryOfOrigin;

    public function __construct()
    {
        $this->quantity = 1;
        $this->weight = new Ounces(0);
    }

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

    public function setWeight(WeightInterface $weight)
    {
        $this->weight = $weight;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function getTotalWeight()
    {
        return $this->weight->scaleBy($this->getQuantity());
    }

    public function setHSTariffNumber($number)
    {
        $this->hsTariffNumber = $number;
    }

    public function getHSTariffNumber()
    {
        return $this->hsTariffNumber;
    }

    public function setCountryOfOrigin($country)
    {
        $this->countryOfOrigin = $country;
    }

    public function getCountryOfOrigin()
    {
        return $this->countryOfOrigin;
    }
}
