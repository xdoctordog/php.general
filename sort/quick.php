<?php

/**
 * Split array.
 *
 * @param array $array
 * @param int $moveBorder
 * @return array
 */
function splitArray(array $array, int $moveBorder = 0): array
{
    $length = count($array);
    $middleKey = (int)($length / 2) + $moveBorder;
    $leftArray = [];
    $rightArray = [];
    for ($v = 0; $v < $middleKey; $v++) {
        $leftArray[] = $array[$v];
    }
    for ($v = $middleKey; $v < $length; $v++) {
        $rightArray[] = $array[$v];
    }

    return [$leftArray, $rightArray];
}

/**
 * Compare and change places.
 *
 * @param array $array
 * @param bool $hasPermutations
 * @return array
 */
function compareAndChange(array $array, bool &$hasPermutations): array
{
    $length = count($array);
    $middleKey = (int)($length / 2);

    for ($leftSideKey = 0; $leftSideKey < $middleKey; $leftSideKey++) {
        $rightSideKey = ($middleKey * 2) - $leftSideKey;
        if (!($length % 2)) {
            $rightSideKey--;
        }
        if (isset($array[$leftSideKey]) && isset($array[$rightSideKey])) {
            if ($array[$leftSideKey] > $array[$rightSideKey]) {
                $hasPermutations = true;
                $bufferValue = $array[$leftSideKey];
                $array[$leftSideKey] = $array[$rightSideKey];
                $array[$rightSideKey] = $bufferValue;
            }
        }
    }

    return $array;
}

/**
 * Quick sort.
 *
 * @param array $array
 * @return array
 */
function quickSort(array $array): array
{
    $length = count($array);

    if ($length > 1) {

        // Init value
        $hasPermutations = true;
        while ($hasPermutations) {
            $hasPermutations = false;

            $array = compareAndChange($array, $hasPermutations);

            // Let's split the array on parts
            if ($length > 2) {
                $moveBorder = 0;
                while ($moveBorder <= 1) {
                    list($leftArray, $rightArray) = splitArray($array, $moveBorder);
                    $_leftArray = quickSort($leftArray);
                    $_rightArray = quickSort($rightArray);

                    $lengthRightArray = count($_rightArray);
                    for ($iRight = 0; $iRight < $lengthRightArray; $iRight++) {
                        $_leftArray[] = $_rightArray[$iRight];
                    }
                    $array = $_leftArray;
                    $moveBorder++;
                }
            }

        }

    }

    return $array;
}

$array = [];
$i = 0;
while ($i++ < 10) {
    $array[] = mt_rand(1, 99);
}

echo '<pre>';
var_dump($array);
var_dump(quickSort($array));

