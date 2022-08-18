<?php

$line = explode(' ', fgets(STDIN));

$string = trim(fgets(STDIN));
$answers = [];
$alphas = array_flip(range('a', 'z'));
for ($i=0; $i < (int) $line[1]; $i++) {
    $question = fscanf(STDIN, "%d %d", $start, $end);
    $substring = substr($string, $start-1, $end - $start + 1);
    $count = 0;
    foreach (count_chars($substring, 1) as $key => $value) {
        $count += ($alphas[chr($key)]+1) * $value;
    }
    $answers[] = $count;
}

foreach ($answers as $item) {
    echo $item . PHP_EOL;
}
