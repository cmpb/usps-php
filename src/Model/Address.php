<?php

namespace Kohabi\USPS\Model;

class Address implements \ArrayAccess
{
    private $company;
    private $line = array();
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

    public function setRecipient(Fullname $recipient)
    {
        $this->recipient = $recipient;
    }

    public function getRecipient()
    {
        return $this->recipient;
    }

    public function offsetExists($offset)
    {
        return isset($this->line[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->offsetExists($offset) ? $this->line[$offset] : null;
    }

    public function offsetSet($offset, $value)
    {
        if ($offset === null) {
            $this->line[] = $value;
        } else {
            $this->line[$offset] = $value;
        }
    }

    public function offsetUnset($offset)
    {
        unset($this->line[$offset]);
    }

    public function setLine1($line)
    {
        $this[0] = $line;
    }

    public function getLine1()
    {
        return $this[0];
    }

    public function setLine2($line)
    {
        $this[1] = $line;
    }

    public function getLine2()
    {
        return $this[1];
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
