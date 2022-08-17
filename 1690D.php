<?php

$testCases = (int) fgets(STDIN);

$answers = [];

for ($i=0; $i < $testCases; $i++) {
    $fistLine = explode(' ', fgets(STDIN));

    $length = (int) $fistLine[0];
    $target = (int) $fistLine[1];

    $string = fgets(STDIN);
    $cells = str_split($string);

    $firstArrayValue = array_count_values(str_split(substr($string, 0, $target)));
    $current = !empty($firstArrayValue['W']) ? $firstArrayValue['W'] : 0;
    $min = $current;

    for ($j=$target; $j < $length; $j++) {
        // Remove First
        if ($cells[$j - $target] === 'W') {
            $current--;
        }
        // Add to the End
        if ($cells[$j] === 'W') {
            $current++;
        }
        // Check Min Value
        if ($min > $current) {
            $min = $current;
        }
    }

    $answers[] = $min;
}

foreach ($answers as $item) {
    echo $item . PHP_EOL;
}
