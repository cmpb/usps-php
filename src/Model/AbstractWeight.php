<?php

namespace Kohabi\USPS\Model;

abstract class AbstractWeight implements WeightInterface
{
    abstract public function toOunces();
    abstract public function toPounds();
    abstract public function scaleBy($factor);

    final public function toRational()
    {
        return array(
            floor($this->toPounds()),
            $this->toOunces() % 16
        );
    }
}
