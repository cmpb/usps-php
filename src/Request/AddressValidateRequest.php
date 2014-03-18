<?php

namespace Kohabi\USPS\Request;

class AddressValidateRequest implements RequestInterface
{
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

    public function getXmlBody()
    {
        return '';
    }
}
