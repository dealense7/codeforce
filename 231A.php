<?php
$problems = fgets(STDIN);
$solutions = 0;

function aggree($value)
{
    if ((int) $value === 1) {
        return true;
    }
}

for ($i=0; $i < $problems; $i++) {
    $supporters = fgets(STDIN);
    if (count(array_filter(explode(' ', $supporters), 'aggree')) > 1) {
        $solutions++;
    }
}
echo $solutions;
