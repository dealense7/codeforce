<?php
$string = fgets(STDIN);

$upper = strlen(preg_replace('~[^A-Z]~', '', $string));
$lower = strlen(preg_replace('~[^a-z]~', '', $string));

if ($upper > $lower) {
    echo strtoupper($string);
} else {
    echo strtolower($string);
}
