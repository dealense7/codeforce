<?php

$testCases = fgets(STDIN);
$answers = [];
$alphas = array_flip(range('a', 'z'));

for ($i=0; $i < $testCases; $i++) {
    $string = trim(fgets(STDIN));
    $number = (int) fgets(STDIN);

    $arrayOfString = str_split($string);
    $arrayOfStringValue = [];

    foreach ($arrayOfString as $key => $value) {
        $arrayOfStringValue[$key] = $alphas[$value]+1;
    }

    $priceOfString = array_sum($arrayOfStringValue);

    while ($priceOfString > $number) {
        if (count($arrayOfStringValue) < 1) {
            break;
        }
        $priceOfString = clearString($arrayOfStringValue);
    }

    $buildString = '';

    foreach ($arrayOfStringValue as $key => $value) {
        $buildString .= $arrayOfString[$key];
    }

    $answers[] = $buildString;
}

foreach ($answers as $item) {
    echo $item . PHP_EOL;
}

function clearString(
    array &$arrayOfStringValue
): int {
    $maxValue = max($arrayOfStringValue);

    $index = array_search($maxValue, $arrayOfStringValue);

    unset($arrayOfStringValue[$index]);

    return array_sum($arrayOfStringValue);
}
