<?php

namespace Kohabi\USPS\Model;

class Fullname
{
    private $full;
    private $first;
    private $last;

    public function __construct()
    {
        $args = func_get_args();
        $numArgs = func_num_args();

        if ($numArgs === 1) {
            $this->full = $args[0];
            $parts = explode(' ', $this->full);
            $numParts = count($parts);
            $this->first = $parts[0];
            if ($numParts > 0) {
                $this->last = $parts[$numParts-1];
            }
        } elseif ($numArgs === 2) {
            $this->full = $args[0] . ' ' . $args[1];
            $this->first = $args[0];
            $this->last = $args[1];
        } else {
            throw new \InvalidArgumentException('Invalid Number of Arguments');
        }
    }

    public function first()
    {
        return $this->first;
    }

    public function last()
    {
        return $this->last;
    }

    public function full()
    {
        return $this->full;
    }

    public function __toString()
    {
        return $this->full();
    }
}
