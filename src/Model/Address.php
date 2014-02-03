<?php

namespace Kohabi\USPS\Model;

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
    private $zip5;
    private $zip4;

    public function setCompany($company)
    {
        $this->company = $company;
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        $this->fullName = null;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        $this->fullName = null;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setName($name)
    {
        $this->fullName = $name;
    }

    public function getName()
    {
        if ($this->fullName) {
            return $this->fullName;
        }
        if ($this->firstName && $this->lastName) {
            return $this->fullName = $this->firstName . ' ' . $this->lastName;
        }
        return null;
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
        $this->zip5 = null;
        $this->zip4 = null;
    }

    public function getPostalCode()
    {
        if ($this->postalCode) {
            return $this->postalCode;
        }
        if ($this->zip5) {
            if ($this->zip4) {
                return $this->zip5 . '-' . $this->zip4;
            } else {
                return $this->zip5;
            }
        }
        return null;
    }

    public function setZip5($zip5)
    {
        $this->zip5 = $zip5;
        $this->postalCode = null;
    }

    public function setZip4($zip4)
    {
        $this->zip4 = $zip4;
        $this->postalCode = null;
    }

    public function getZip5()
    {
        if ($this->zip5) {
            return $this->zip5;
        }
        if ($this->postalCode) {
            $parts = explode('-', $this->postalCode);
            if (isset($parts[0])) {
                return $this->zip5 = $parts[0];
            }
        }
        return null;
    }

    public function getZip4()
    {
        if ($this->zip4) {
            return $this->zip4;
        }
        if ($this->postalCode) {
            $parts = explode('-', $this->postalCode);
            if (isset($parts[1])) {
                return $this->zip4 = $parts[1];
            }
        }
        return null;
    }
}
