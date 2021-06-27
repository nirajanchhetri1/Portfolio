<?php

function convertAAn($char){
    $newChar=strtolower($char);

    return ($newChar=='a'|$newChar=='e'|$newChar=='i'|$newChar=='o'|$newChar=='u')?'An':'A';
}