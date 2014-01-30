<?php

namespace Kohabi\USPS;

class ErrorChecker
{
    public function check($data)
    {
        if ($data->getName() === 'Error') {
            $message = (string) $data->Description;
            $code = (int) $data->Number;
            throw new APIException($message, $code);
        }
    }
}
