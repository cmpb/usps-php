<?php

namespace Kohabi\USPS;

class XMLParser
{
    public function parse($response)
    {
        return simplexml_load_string($response);
    }
}
