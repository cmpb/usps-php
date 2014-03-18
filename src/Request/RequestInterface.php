<?php

namespace Kohabi\USPS\Request;

interface RequestInterface
{
    /**
     * @return string
     */
    public function getApiName();

    /**
     * @return string
     */
    public function getRootElementName();

    /**
     * @return string
     */
    public function getXmlBody();

    /**
     * @return bool
     */
    public function requiresUserid();

    /**
     * @return bool
     */
    public function requiresPassword();

    /**
     * @return bool
     */
    public function supportsSecure();

    /**
     * @return bool
     */
    public function supportsProduction();
}
