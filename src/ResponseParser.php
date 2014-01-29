<?php

namespace Kohabi\USPS;

class ResponseParser
{
    public function parse($response)
    {
        $xml = simplexml_load_string($response);
        if ($xml->getName() === 'Error') {
            $message = $xml->Description;
            $code = $xml->Number;
            throw new APIException((string)$message, (int)$code);
        }
        return $xml;
    }
}
