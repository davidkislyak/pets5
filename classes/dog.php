<?php

class dog extends pet
{
    function fetch()
    {
        echo "<p>" . $this->getName() . " is fetching.</p>";
    }

    function talk()
    {
        echo $this->getName() . " is barking<br>";
//        get_parent_class($this);
    }
}
