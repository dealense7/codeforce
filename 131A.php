<?php

$string = trim(fgets(STDIN));

$mapedCount = count(array_filter(array_map('countUppercaase', str_split($string))));
$stringLength = strlen($string);
if (
    !ctype_upper(substr($string, 0, 1))
    && $mapedCount === $stringLength - 1
) {
    echo ucfirst(strtolower($string));
} elseif ($mapedCount === $stringLength) {
    echo strtolower($string);
} else {
    echo $string;
}

function countUppercaase($char)
{
    if (ctype_upper($char)) {
        return $char;
    }
}
