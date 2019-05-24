#!/usr/bin/php
<?php
    $x = 2;
    $ma ='pow($x,2) + sin($x) + $x';
    $p = eval('return '.$ma.';');
    print $p;
    echo "\n";
    

?>