<?php

/**
 * @param array $array
 * @param bool  $mergeThese
 *
 * @return array
 */
function sortMerge(array $array): array
{
  $count = count($array);
//    var_dump([
//      '$count' => $count,
//      '$array' => $array,
//      'count($array)' => count($array),
//    ]);
//
//    exit;

  if (count($array) <= 1) {

    return $array;
  } else {
    $length     = count($array);
    $middle     = (int)($length / 2);
    $leftArray  = [];
    $rightArray = [];
    for ($i = 0; $i < $middle; $i++) {
      $leftArray[] = $array[$i];
    }
    for ($i = $middle; $i < $length; $i++) {
      $rightArray[] = $array[$i];
    }

    $_leftArray  = sortMerge($leftArray);
    $_rightArray = sortMerge($rightArray);

    $resultArray = mergeSortedArrays($_leftArray, $_rightArray);
  }

  return $resultArray;
}

/**
 * Merge sorted arrays
 *
 * @param $arrayA
 * @param $arrayB
 *
 * @return array
 */
function mergeSortedArrays($arrayA, $arrayB) :array
{
  $resultArray = [];
  $lengthA = count($arrayA);
  $lengthB = count($arrayB);

  $iA = 0;
  $iB = 0;

  $valueA = null;
  $valueB = null;

  if ($iA < $lengthA) {
    $valueA = $arrayA[$iA] ?? null;
    $iA ++;
  }

  if ($iB < $lengthB) {
    $valueB = $arrayB[$iB] ?? null;
    $iB ++;
  }

  while (count($resultArray) < $lengthA + $lengthB) {
    if (($valueA !== null) && ($valueB !== null)) {
      if ($valueA < $valueB) {
        $resultArray[] = $valueA;
        if (isset($arrayA[$iA])) {
          $valueA = $arrayA[$iA];
          $iA ++;
        } else {
          $valueA = null;
        }
      } else {
        $resultArray[] = $valueB;
        if (isset($arrayB[$iB])) {
          $valueB = $arrayB[$iB];
          $iB ++;
        } else {
          $valueB = null;
        }
      }
    } else {
      if (($valueA !== null) && ($valueB === null)) {
        $resultArray[] = $valueA;
        if (isset($arrayA[$iA])) {
          $valueA = $arrayA[$iA];
          $iA ++;
        } else {
          $valueA = null;
        }
      }
      if (($valueB !== null) && ($valueA === null)) {
        $resultArray[] = $valueB;
        if (isset($arrayB[$iB])) {
          $valueB = $arrayB[$iB];
          $iB ++;
        } else {
          $valueB = null;
        }
      }
    }
  }

  return $resultArray;
}

$array = [];
$i     = 0;
while ($i++ < 10) {
  $array[] = mt_rand(1, 99);
}
echo '<pre>';

//$array = [8, 0, 6, 9, 3];
var_dump($array);
var_dump(sortMerge($array));
//var_dump(mergeSortedArrays([3, 6, 10], [5, 7, 12]));
//var_dump(mergeSortedArrays([1], [5, 3]));
//var_dump(mergeSortedArrays([7, 4, 1, 8 ], [3]));

