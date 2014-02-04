<?php

namespace Kohabi\USPS\Model;

class Package
{
    private $items = array();
    private $container;
    private static $containers = array(
        'VARIABLE',
        'FLATRATEENV',
        'LEGALFLATRATEENV',
        'PADDEDFLATRATEENV',
        'FLATRATEBOX',
        'RECTANGULAR',
        'NONRECTANGULAR'
    );

    public function addItem(PackageItem $item)
    {
        $this->items[] = $item;
    }

    public function getItem($n)
    {
        return isset($this->items[$n]) ? $this->items[$n] : null;
    }

    public function getNumberOfItems()
    {
        return count($this->items);
    }

    public function setContainer($container)
    {
        if (!in_array($container, self::$containers)) {
            throw new \InvalidArgumentException('Invalid Container');
        }

        $this->container = $container;
    }

    public function getContainer()
    {
        return $this->container;
    }
}
