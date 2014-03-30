<?php

namespace Kohabi\USPS\Model;

final class Ounces extends AbstractWeight
{
    private $ounces;

    public function __construct($ounces)
    {
        $this->ounces = $ounces;
    }

    public function toOunces()
    {
        return $this->ounces;
    }

    public function toPounds()
    {
        return $this->ounces / 16;
    }

    public function scaleBy($factor)
    {
        return new Ounces($this->ounces * $factor);
    }
}
