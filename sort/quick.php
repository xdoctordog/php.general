<?php

function quickSort(array $array):array
{
      var_dump([
        'IN $array' => $array,
      ]);
  $length = count($array);

  if ($length > 1) {
    $middleKey = (int)($length / 2);
    $flag = $length % 2;
    for ($leftSideKey = 0; $leftSideKey < $middleKey; $leftSideKey ++) {
      $rightSideKey = ($middleKey * 2) - $leftSideKey;
      if (!$flag) {
        $rightSideKey --;
      }

//      exit;
      if ($array[$leftSideKey] > $array[$rightSideKey]) {
        $bufferValue = $array[$leftSideKey];
        $array[$leftSideKey] = $array[$rightSideKey];
        $array[$rightSideKey] = $bufferValue;
      }
    }

      var_dump([
          'OUT $array' => $array,
//          '$middleKey' => $middleKey,
//          '$leftSideKey' => $leftSideKey,
//          '$rightSideKey' => $rightSideKey,
      ]);
//      exit;

    if ($length > 2) {
      $leftArray = [];
      $rightArray = [];
        for ($v = 0; $v < $middleKey; $v ++) {
          $leftArray[] = $array[$v];
        }
        for ($v = $middleKey; $v < $length; $v ++) {
          $rightArray[] = $array[$v];
        }
        $_leftArray = quickSort($leftArray);
        $_rightArray = quickSort($rightArray);

        $lengthRightArray = count($_rightArray);
        for ($iRight = 0; $iRight < $lengthRightArray; $iRight ++) {
          $_leftArray[] = $_rightArray[$iRight];
        }
        $array = $_leftArray;
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
//var_dump($array);
//quickSort($array);
var_dump($array = quickSort($array));
var_dump($array = quickSort($array));

