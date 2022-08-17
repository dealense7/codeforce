<?php

$testCases = fgets(STDIN);
$answers = [];

for ($i=0; $i < $testCases; $i++) {
    $word = trim(fgets(STDIN));
    $splitWord = str_split($word);
    $size = strlen($word);

    if ($size > 10) {
        $answers[] = $splitWord[0] . $size-2 . $splitWord[$size-1];
    } else {
        $answers[] = $word;
    }
}

foreach ($answers as $item) {
    echo $item . PHP_EOL;
}
