<?php

namespace Kohabi\USPS\Tests\Model;

use Kohabi\USPS\Model\Fullname;

class FullnameTest extends \PHPUnit_Framework_TestCase
{
    public function testConstruction()
    {
        $names = array(
            new Fullname('Jon', 'Snow'),
            new Fullname('Jon Snow')
        );

        foreach ($names as $name) {
            $this->assertEquals('Jon', $name->first());
            $this->assertEquals('Snow', $name->last());
            $this->assertEquals('Jon Snow', $name->full());
            $this->assertEquals('Jon Snow', (string) $name);
        }
    }

    public function test3PartName()
    {
        $name = new Fullname('Jon A Snow');

        $this->assertEquals('Jon', $name->first());
        $this->assertEquals('Snow', $name->last());
        $this->assertEquals('Jon A Snow', $name->full());
        $this->assertEquals('Jon A Snow', (string) $name);
    }

    public function testEmptyConstructor()
    {
        $this->setExpectedException(
            'InvalidArgumentException',
            'Invalid Number of Arguments'
        );

        new Fullname();
    }

    public function testTooManyArgs()
    {
        $this->setExpectedException(
            'InvalidArgumentException',
            'Invalid Number of Arguments'
        );

        new Fullname('a', 'b', 'c');
    }
}
