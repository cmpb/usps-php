<?php

namespace Kohabi\USPS\Request;

use Kohabi\USPS\Model\Address;

class AddressValidateRequest implements RequestInterface
{
    /**
     * @var array
     */
    private $addresses = array();

    public function getApiName()
    {
        return 'Verify';
    }

    public function getRootElementName()
    {
        return 'AddressValidateRequest';
    }

    public function requiresUserid()
    {
        return true;
    }

    public function requiresPassword()
    {
        return false;
    }

    public function supportsSecure()
    {
        return false;
    }

    public function supportsProduction()
    {
        return true;
    }

    /**
     * @param \Kohabi\USPS\Model\Address $address
     */
    public function addAddress(Address $address)
    {
        $this->addresses[] = $address;
    }

    public function getXmlBody()
    {
        $body = '';
        foreach ($this->addresses as $address) {
            $body .= $this->map($address);
        }
        return $body;
    }

    private function map(Address $address)
    {
        return '<Address>' .
                   '<Address1>' . $address->getLine2() . '</Address1>' .
                   '<Address2>' . $address->getLine1() . '</Address2>' .
                   '<City>' . $address->getCity() . '</City>' .
                   '<State>' . $address->getState() . '</State>' .
                   '<Zip5>' . $address->getZip5() . '</Zip5>' .
                   '<Zip4>' . $address->getZip4() . '</Zip4>' .
               '</Address>';
    }
}
