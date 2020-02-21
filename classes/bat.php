<?php

class bat extends pet
{
    function talk()
    {
        echo $this->getName() . " is screeching<br>";
    }

    function attack()  {
        echo "Oh no, you have been attacked by a bat and infected with the coronavirus.";
    }
}