<?php
$input = fgets(STDIN);

$pas = intval($input / 5);
if ($input % 5 > 0) {
    $pas++;
}
echo $pas;
