<?php

namespace Kohabi\USPS\Model;

interface WeightInterface
{
    /**
     * @return int
     */
    public function toOunces();

    /**
     * @return int
     */
    public function toPounds();

    /**
     * @return array
     */
    public function toRational();

    /**
     * @return WeightInterface
     */
    public function scaleBy($factor);
}
