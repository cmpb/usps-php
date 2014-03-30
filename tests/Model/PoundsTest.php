<?php

namespace Kohabi\USPS\Tests\Model;

use Kohabi\USPS\Model\Pounds;

class PoundsTest extends AbstractWeightTestCase
{
    protected function createWeight($n)
    {
        return new Pounds($n);
    }
}
