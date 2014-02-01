<?php

namespace Kohabi\USPS\ResponseMapper;

use Kohabi\USPS\Model\Address;

class StandardizeAddress
{
    public function map($response)
    {
        $address = new Address();
        $address->setLine1($response->Address->Address2);
        $address->setState($response->Address->State);
        $address->setCity($response->Address->City);
        $address->setZip5($response->Address->Zip5);
        $address->setZip4($response->Address->Zip4);
        return $address;
    }
}
