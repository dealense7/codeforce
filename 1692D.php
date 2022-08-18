<?php

$testCases = (int) fgets(STDIN);
$answers = [];

for ($j=0; $j < $testCases; $j++) {
    $line = explode(' ', fgets(STDIN));
    $time = $line[0];
    $minutes = (int) $line[1];

    $lastTime = null;
    $palindromeCount = 0;
    while ($time != $lastTime) {
        $lastTime = date('H:i', strtotime("+" . $minutes . " minutes", strtotime($lastTime ?? $time)));
        $palindromeCount += ($lastTime === strrev($lastTime)) ? 1 : 0;
    }

    $answers[] = $palindromeCount;
}

foreach ($answers as $item) {
    echo $item . PHP_EOL;
}
