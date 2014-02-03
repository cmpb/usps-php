<?php

namespace Kohabi\USPS\Model;

class Contact
{
    private $firstName;
    private $lastName;
    private $fullName;
    private $phoneNumber;
    private $address;
    private $email;

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
        $this->firstName = null;
        $this->lastName = null;
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

    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    public function setAddress(Address $address)
    {
        $this->address = $address;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }
}
