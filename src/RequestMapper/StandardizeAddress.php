<?php

namespace Kohabi\USPS\RequestMapper;

use Kohabi\USPS\Address;

class StandardizeAddress
{
    public function map($userid, Address $address)
    {
        $xml = '<AddressValidateRequest USERID="' . $userid . '">';
        $xml .= '<Address>';
        $xml .= '<Address1>' . $address->getLine2() . '</Address1>';
        $xml .= '<Address2>' . $address->getLine1() . '</Address2>';
        $xml .= '<City>' . $address->getCity() . '</City>';
        $xml .= '<State>' . $address->getState() . '</State>';
        $xml .= '<Zip5>' . $address->getZip5() . '</Zip5>';
        $xml .= '<Zip4>' . $address->getZip4() . '</Zip4>';
        $xml .= '</Address>';
        $xml .= '</AddressValidateRequest>';
        return $xml;
    }
}
