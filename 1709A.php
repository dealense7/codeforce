<?php

$testCases = fgets(STDIN);

$answers = [];
for ($i=0; $i < $testCases; $i++) {
    $key = (int) fgets(STDIN);
    $keysBehind = array_map('intval', explode(' ', fgets(STDIN)));

    if (
        $keysBehind[$key - 1] !== 0
        && isset($keysBehind[$keysBehind[$key - 1] - 1])
        && $keysBehind[$keysBehind[$key - 1] - 1] !== 0
    ) {
        $answers[] = 'YES';
    } else {
        $answers[] = 'NO';
    }
}

foreach ($answers as $item) {
    echo $item . PHP_EOL;
}
