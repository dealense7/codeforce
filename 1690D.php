<?php

// TODO:: Improve, Goes on Timeout
$testCases = (int) fgets(STDIN);

$answers = [];

for ($i=0; $i < $testCases; $i++) {
    $fistLine = explode(' ', fgets(STDIN));

    $length = (int) $fistLine[0];
    $target = (int) $fistLine[1];

    $cells = fgets(STDIN);

    $min = null;

    for ($j=0; $j < $length - $target + 1; $j++) {
        $value = (str_split(substr($cells, $j, $target)))['W'] ?? 0;
        $min = $min === null ? $value : ($min > $value ? $value : $min);
    }

    $answers[] = $min;
}

foreach ($answers as $item) {
    echo $item . PHP_EOL;
}
