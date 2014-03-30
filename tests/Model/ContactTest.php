<?php

namespace Kohabi\USPS\Tests\Model;

use Kohabi\USPS\Model\Contact;
use Kohabi\USPS\Model\Fullname;
use Kohabi\USPS\Model\Address;

class ContactTest extends \PHPUnit_Framework_TestCase
{
    private $contact;

    protected function setUp()
    {
        $this->contact = new Contact();
    }

    public function testName()
    {
        $name = new Fullname('Jon Snow');
        $this->contact->setName($name);
        $this->assertSame($name, $this->contact->getName());
    }

    public function testPhoneNumber()
    {
        $this->contact->setPhoneNumber('555 555 5555');
        $this->assertEquals('555 555 5555', $this->contact->getPhoneNumber());
    }

    public function testEmail()
    {
        $this->contact->setEmail('john.doe@mail.com');
        $this->assertEquals('john.doe@mail.com', $this->contact->getEmail());
    }

    public function testAddress()
    {
        $address = new Address();
        $this->contact->setAddress($address);
        $this->assertSame($address, $this->contact->getAddress());
    }
}
