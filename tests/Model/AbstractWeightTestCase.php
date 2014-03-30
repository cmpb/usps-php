<?php

namespace Kohabi\USPS\Tests\Model;

abstract class AbstractWeightTestCase extends \PHPUnit_Framework_TestCase
{
    private $weight;

    protected function setUp()
    {
        $this->weight = $this->createWeight(rand(1, 15));
    }

    abstract protected function createWeight($n);

    public function testImplementsWeightInterface()
    {
        $this->assertInstanceOf(
            '\Kohabi\USPS\Model\WeightInterface',
            $this->weight
        );
    }

    public function testConversion()
    {
        $ounces = $this->weight->toOunces();
        $pounds = $this->weight->toPounds();

        $this->assertEquals($ounces / 16, $pounds);
        $this->assertEquals($pounds * 16, $ounces);
    }

    public function testRational()
    {
        $expected = array(
            floor($this->weight->toPounds()),
            $this->weight->toOunces() % 16
        );

        $this->assertEquals($expected, $this->weight->toRational());
    }

    public function testScaleBy()
    {
        $n = rand(1, 15);
        $a = $this->weight->toOunces();
        $b = $this->weight->scaleBy($n)->toOunces();

        $this->assertEquals($a * $n, $b);
    }
}
