<?php

$num1 = filter_input(INPUT_GET, "num1", FILTER_VALIDATE_INT);
$num2 = filter_input(INPUT_GET, "num2", FILTER_VALIDATE_INT);

$results = []

if ($num1 > 0 && $num2 > 0 && $num1 > $num2)
{
    $rangeNum = range($num2, $num1)
    array_push($results["1"], rand($rangeNum))
}
else if ($num1 < $num2 && $num1 < 0 && $num2 < 0)
{
    echo $results = ["-1"];
}
echo json_encode($results)
?>
