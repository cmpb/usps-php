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

    /**
     * @param int $n 0-indexed address line
     * @return mixed
     */
    public function getLine($n)
    {
        return isset($this->lines[$n]) ? $this->lines[$n] : null;
    }

    /**
     * @param int $n 0-indexed address line
     * @param string $line
     */
    public function setLine($n, $line)
    {
        $this->lines[$n] = $line;
    }

    public function setLine1($line1)
    {
        $this->setLine(0, $line1);
    }

    public function setLine2($line2)
    {
        $this->setLine(1, $line2);
    }

    public function getLine1()
    {
        return $this->getLine(0);
    }

    public function getLine2()
    {
        return $this->getLine(1);
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

    public function getZip5()
    {
        $parts = explode('-', $this->postalCode);
        if (isset($parts[0])) {
            return $parts[0];
        }
        return null;
    }

    public function getZip4()
    {
        $parts = explode('-', $this->postalCode);
        if (isset($parts[1])) {
            return $parts[1];
        }
        return null;
    }
}
