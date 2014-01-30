<?php

namespace Kohabi\USPS\RequestMapper;

use Kohabi\USPS\Address;

class ZipCodeLookup
{
    public function map($userid, Address $address)
    {
        $xml = '<ZipCodeLookupRequest USERID="' . $userid . '">';
        $xml .= '<Address>';
        $xml .= '<Address1>' . $address->getLine2() . '</Address1>';
        $xml .= '<Address2>' . $address->getLine1() . '</Address2>';
        $xml .= '<City>' . $address->getCity() . '</City>';
        $xml .= '<State>' . $address->getState() . '</State>';
        $xml .= '</Address>';
        $xml .= '</ZipCodeLookupRequest>';
        return $xml;
    }
}
