<?php

namespace Kohabi\USPS\Mapper;

use Kohabi\USPS\Address;

class StandardizeAddressResponse
{
    public function map($response)
    {
        $address = new Address();
        $address->addLine($response->Address->Address2);
        $address->setState($response->Address->State);
        $address->setCity($response->Address->City);
        $address->setPostalCode($response->Address->Zip5 . '-' .
                                $response->Address->Zip4);
        return $address;
    }
}
