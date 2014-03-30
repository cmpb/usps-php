<?php

namespace Kohabi\USPS\Tests\Model;

use Kohabi\USPS\Model\Ounces;

class OuncesTest extends AbstractWeightTestCase
{
    protected function createWeight($n)
    {
        return new Ounces($n);
    }
}
