<?php
    function validColor($color){
        global $f3;
        return in_array($color, $f3->get('colors'));
    }
    function validString($string){
        return (!empty(trim($string)) && ctype_alpha($string));
    }
