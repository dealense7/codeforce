<?php
$input = fgets(STDIN);
$info = explode(' ', $input);

$bananaCost = $info[0];
$money = $info[1];
$bananasToBuy = $info[2];

$moneyToSpend = 0;

for ($i=1; $i < $bananasToBuy+1; $i++) {
    $moneyToSpend += $i*$bananaCost;
}

$borrow = $moneyToSpend - $money;

echo ($borrow > 0) ? $borrow : 0;
