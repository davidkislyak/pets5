<?php

class cat extends pet
{
    function talk()
    {
        echo $this->getName() . " is meowing<br>";
    }
}