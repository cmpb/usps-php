<?php

namespace Kohabi\USPS;

class Address
{
    private $company;
    private $fullName;
    private $firstName;
    private $lastName;
    private $lines = array();
    private $state;
    private $city;
    private $postalCode;

    public function setCompany($company)
    {
        $this->company = $company;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    public function getFullName()
    {
        if ($this->fullName) {
            return $this->fullName;
        }
        if ($this->firstName && $this->lastName) {
            return $this->firstName . ' ' . $this->lastName;
        }
        return null;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLines(array $lines)
    {
        $this->lines = $lines;
    }

    public function getLines()
    {
        return $this->lines;
    }

    public function addLine($line)
    {
        $this->lines[] = $line;
    }

    public function getLine($n)
    {
        return isset($this->lines[$n]) ? $this->lines[$n] : null;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }

    public function setProvince($province)
    {
        $this->state = $province;
    }

    public function getProvince()
    {
        return $this->state;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;
    }

    public function getPostalCode()
    {
        return $this->postalCode;
    }
}
