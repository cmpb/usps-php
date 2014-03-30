<?php

namespace Kohabi\USPS\Model;

final class Pounds extends AbstractWeight
{
    private $pounds;

    public function __construct($pounds)
    {
        $this->pounds = $pounds;
    }

    public function toOunces()
    {
        return $this->pounds * 16;
    }

    public function toPounds()
    {
        return $this->pounds;
    }

    public function scaleBy($factor)
    {
        return new Pounds($this->pounds * $factor);
    }
}
