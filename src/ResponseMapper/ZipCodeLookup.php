<?php

namespace Kohabi\USPS\ResponseMapper;

use Kohabi\USPS\Model\Address;

class ZipCodeLookup
{
    public function map($data)
    {
        $address = new Address();
        $address->setLine1($data->Address->Address2);
        $address->setCity($data->Address->City);
        $address->setState($data->Address->State);
        $address->setZip5($data->Address->Zip5);
        $address->setZip4($data->Address->Zip4);
        return $address;
    }
}
