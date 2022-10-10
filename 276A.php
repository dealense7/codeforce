<?php

fscanf(STDIN, "%d%d", $n, $k);

$max = null;

for ($i=0; $i < $n; $i++) {
    fscanf(STDIN, "%d%d", $f, $t);
    if ($t > $k) {
        $tmp = $f - ($t - $k);
    } else {
        $tmp = $f;
    }
    if ($tmp > $max) {
        $max = $tmp;
    }
}

echo $max;
