<?php

/**
 * Created by PhpStorm.
 * User: APG
 * Date: 16.05.2020
 * Time: 15:35
 */
class Calculator
{
    public static function calculate($number1, $number2, callable $callback)
    {
        return $callback($number1, $number2);
    }
}

function minus($n1, $n2)
{
    return $n1 - $n2;
}
function divide($n1, $n2)
{
    return $n1 / $n2;
}
function mult($n1, $n2)
{
    return $n1 * $n2;
}


$callbacks = [
    'minus',

    'divide',

    'mult',
];

$numbers = [
    [
        5,
        10,
    ],
    [
        8,
        13,
    ]
];

echo "<pre>";

foreach ($numbers as $item) {
    echo 'Numbers are ' . $item[0] . " " . $item[1] . ":<br>";
    echo Calculator::calculate($item[0], $item[1], function ($n1, $n2) {
            return $n1 + $n2;
        }) . "<br>";
    echo Calculator::calculate($item[0], $item[1], $callbacks[0]) . "<br>";
    echo Calculator::calculate($item[0], $item[1], $callbacks[1]) . "<br>";
    echo Calculator::calculate($item[0], $item[1], $callbacks[2]) . "<br>";
}


echo "</pre>";
