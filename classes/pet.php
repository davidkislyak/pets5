<?php

/**
 * Pet class, provides a way to represent a pet object with a name and color.
 *
 * @author David Kislyak
 * @copyright 2020
 */
class pet
{
    private $_name;
    private $_color;
    private $_type;

    /**
     * Pet class constructor.
     *
     * @param string $name the name of the pet
     * @param string $color the color of the pet
     * @param string $type the type of pet
     */
    function __construct($name = "unknown", $color = "unknown", $type = "unknown")
    {
        $this->_name = $name;
        $this->_color = $color;
        $this->_type = $type;
    }

    //Setters
    function setName($name)
    {
        $this->_name = $name;
    }

    function setColor($color)
    {
        $this->_color = $color;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->_type = $type;
    }

    //Getters
    function getName()
    {
        return $this->_name;
    }

    function getColor()
    {
        return $this->_color;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->_type;
    }

    //Methods
    function eat()
    {
        echo $this->_name . " is eating.<br>";
    }

    function talk()
    {
        echo $this->_name . " is making a sound<br>";
    }
}