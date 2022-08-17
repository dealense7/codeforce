<?php

echo checkWord(str_split(fgets(STDIN))) ? 'YES' : 'NO';

function checkWord($string): bool
{
    $target = ['h', 'e', 'l', 'l', 'o'];
    foreach ($string as $char) {
        $target = array_values($target);
        if (
            isset($target[0])
            && $char === $target[0]
        ) {
            unset($target[0]);
        }
        if (empty($target)) {
            return true;
        }
    }

    return false;
}
