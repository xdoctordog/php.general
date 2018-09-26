<?php

function quickSort(array $array):array
{
  $length = count($array);

  if ($length > 1) {
    $middleKey = (int)$length / 2;
    $flag = $length % 2;
    for ($leftSideKey = 0; $leftSideKey < $middleKey; $leftSideKey ++) {
      $rightSideKey = ($middleKey * 2) - $leftSideKey;
      if (!$flag) {
        $rightSideKey --;
      }
      if ($array[$leftSideKey] > $array[$rightSideKey]) {
        $bufferValue = $array[$leftSideKey];
        $array[$leftSideKey] = $array[$rightSideKey];
        $array[$rightSideKey] = $bufferValue;
      }
    }

    if ($length > 2) {

    }
  }

  return $array;
}

$array = [];
$i     = 0;
while ($i++ < 10) {
  $array[] = mt_rand(1, 99);
}

$array = [7, 3, 9, 5, 0, 2, 4, 1, 6, 8];

echo '<pre>';
var_dump($array);
var_dump(quickSort($array));

