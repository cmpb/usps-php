<?php

namespace Kohabi\USPS\Mapper\Response;

use Kohabi\USPS\Address;

class StandardizeAddress
{
    public function map($response)
    {
        $address = new Address();
        $address->setLine1($response->Address->Address2);
        $address->setState($response->Address->State);
        $address->setCity($response->Address->City);
        $address->setPostalCode(
            $response->Address->Zip5 . '-' . $response->Address->Zip4
        );
        return $address;
    }
}
