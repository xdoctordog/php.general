<?php
/**
 * Sort with insert algorythm
 *
 * @param array $array
 *
 * @return array
 */
function sortInsert(array $array): array {
  // Count of all objects
  $length = count($array);
  for ($i = 0; $i < $length - 1; $i++) {
    // Get next object key
    $nextValueKey = $i + 1;
    // Get next object value in buffer
    $nextValue = $array[$nextValueKey];

    //Examine all previous objects
    for ($y = 0; $y < $nextValueKey; $y++) {
      if ($array[$nextValueKey] < $array[$y]) {
        for ($k = $nextValueKey - 1; $k >= $y; $k--) {
          $array[$k + 1] = $array[$k];
        }
        $array[$y] = $nextValue;
      }
    }
  }

  return $array;
}

$array = [];
$i     = 0;
while ($i++ < 10) {
  $array[] = mt_rand(1, 99);
}
echo '<pre>';

//$array = [8, 0, 6, 9, 3];
var_dump($array);
var_dump(sortInsert($array));
