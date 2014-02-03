<?php

namespace Kohabi\USPS\Model;

class ContactTest extends \PHPUnit_Framework_TestCase
{
    private $contact;

    protected function setUp()
    {
        $this->contact = new Contact();
    }

    public function testSetAndGetFirstName()
    {
        $this->contact->setFirstName('John');
        $this->assertEquals('John', $this->contact->getFirstName());
    }

    public function testSetAndGetLastName()
    {
        $this->contact->setLastName('Doe');
        $this->assertEquals('Doe', $this->contact->getLastName());
    }

    public function testSetAndGetName()
    {
        $this->contact->setName('John Doe');
        $this->assertEquals('John Doe', $this->contact->getName());
    }

    public function testGetNameWithFirstAndLastSet()
    {
        $this->contact->setFirstName('John');
        $this->contact->setLastName('Doe');
        $this->assertEquals(
            'John Doe',
            $this->contact->getName()
        );
    }

    public function testSetAndGetPhoneNumber()
    {
        $this->contact->setPhoneNumber('555 555 5555');
        $this->assertEquals('555 555 5555', $this->contact->getPhoneNumber());
    }

    public function testSetAndGetEmail()
    {
        $this->contact->setEmail('john.doe@mail.com');
        $this->assertEquals('john.doe@mail.com', $this->contact->getEmail());
    }

    public function testSetAndGetAddress()
    {
        $address = new Address();
        $this->contact->setAddress($address);
        $this->assertSame($address, $this->contact->getAddress());
    }
}
