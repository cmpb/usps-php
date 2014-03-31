<?php

namespace Kohabi\USPS\Client;

use Kohabi\USPS\Model\Address;

interface ClientInterface
{
    /**
     * @param \Kohabi\USPS\Model\Address $address
     * @return \Kohabi\USPS\Model\Address
     */
    public function standardizeAddress(Address $address);
}
