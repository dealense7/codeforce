<?php

$input = fgets(STDIN);

$numbers = array_map('intval', explode('+', $input));
sort($numbers);

echo implode("+", $numbers);
