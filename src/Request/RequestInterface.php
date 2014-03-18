<?php

namespace Kohabi\USPS\Request;

interface RequestInterface
{
    /**
     * @return string
     */
    function getApiName();

    /**
     * @return string
     */
    function getRootElementName();

    /**
     * @return string
     */
    function getXmlBody();

    /**
     * @return bool
     */
    function requiresUserid();

    /**
     * @return bool
     */
    function requiresPassword();

    /**
     * @return bool
     */
    function supportsSecure();

    /**
     * @return bool
     */
    function supportsProduction();
}
