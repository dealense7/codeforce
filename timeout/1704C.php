<?php

$testCases = fgets(STDIN);
$answers = [];

for ($i=0; $i < $testCases; $i++) {
    $firstLine = explode(' ', fgets(STDIN));
    $secondLine = explode(' ', fgets(STDIN));

    $totalHouses = (int) $firstLine[0];
    $infectedCount = (int) $firstLine[1];

    $infectedHouses = array_map('intval', $secondLine);
    sort($infectedHouses);
    $notInfectedHouses = generateSequence($totalHouses, $infectedHouses, $infectedCount);

    if ($notInfectedHouses) {
        if (count($notInfectedHouses) > 1) {
            eatTail($notInfectedHouses, $infectedHouses, $infectedCount, $totalHouses);
        }

        protectHouse($notInfectedHouses, $infectedCount);
    }
    $answers[] = $infectedCount;
}
foreach ($answers as $item) {
    echo $item . PHP_EOL;
}
function protectHouse($notInfectedHouses, &$infectedCount)
{
    $toSave = [];
    $endOfEpidemic = false;

    while (!$endOfEpidemic) {
        array_values($toSave);
        if (empty($toSave)) {
            $count = max($notInfectedHouses);
            $key = array_search($count, $notInfectedHouses);
            if ($count > 1) {
                $infectedCount++;
            }
            if ($count > 2) {
                $toSave[] = $key;
                $toSave[] = $key;
            } else {
                $toSave[] = $key;
            }
        }

        if (count($toSave) === 1) {
            unset($notInfectedHouses[array_values($toSave)[0]]);
        }

        foreach ($notInfectedHouses as $key => $value) {
            if (!in_array($key, $toSave)) {
                $infectedCount += $value > 1 ? 2 : 1;
                if ($value - 2 < 1) {
                    unset($notInfectedHouses[$key]);
                } else {
                    $notInfectedHouses[$key] = $value - 2;
                }
            }
        }

        $toSave = array_values($toSave);
        unset($toSave[0]);
        if (empty($notInfectedHouses)) {
            $endOfEpidemic = true;
        }
    }
}

function generateSequence($totalHouses, $infectedHouses, $infectedCount): array
{
    $sequence = [];

    foreach ($infectedHouses as $key => $value) {
        if (
            $key == 0
            && $value !== 1
        ) {
            $sequence[] = $value - 1;
        }
        if (
            isset($infectedHouses[$key+1])
            && $infectedHouses[$key+1] - $value - 1 > 0
        ) {
            $sequence[] = $infectedHouses[$key+1] - $value - 1;
        }
        if (
            $key === $infectedCount-1
            && $value !== $totalHouses
        ) {
            $sequence[] = $totalHouses - $value;
        }
    }

    return $sequence;
}

function eatTail(&$notInfectedHouses, $infectedHouses, $infectedCount, $totalHouses): void
{
    if (
        $infectedHouses[0] !== 1
        && $infectedHouses[$infectedCount-1] !== $totalHouses
    ) {
        $notInfectedHouses[count($notInfectedHouses) - 1] += $notInfectedHouses[0];
        unset($notInfectedHouses[0]);
        array_values($notInfectedHouses);
    }
}
