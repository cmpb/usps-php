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
    private static $sizes = array(
        'REGULAR',
        'LARGE'
    );
    private $size;
    private $length;
    private $width;
    private $height;
    private $girth;

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

    public function setSize($size)
    {
        if (!in_array($size, self::$sizes)) {
            throw new \InvalidArgumentException('Invalid Size');
        }

        $this->size = $size;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function setLength($length)
    {
        $this->length = $length;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setGirth($girth)
    {
        $this->girth = $girth;
    }

    public function getGirth()
    {
        return $this->girth;
    }
}
