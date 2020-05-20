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

$add = function ($number1, $number2) {
    return $number1 + $number2;
};


$callbacks = [

    $add,

    function ($number1, $number2) {
        return $number1 - $number2;
    },

    'mult',

    [new Divider(), 'divide'],

];


function mult($number1, $number2)
{
    return $number1 * $number2;
}


class Divider
{
    public function divide($number1, $number2)
    {
        return $number1 / $number2;
    }
}

$numbers = [
    [
        5,
        10,
    ],
    [
        8,
        13,
    ],
    [
        15,
        2,
    ],
];

echo "<pre>";

foreach ($numbers as $item) {
    echo '== Numbers are ' . $item[0] . " " . $item[1] . ":<br>";
    # анонимная функция
    echo Calculator::calculate($item[0], $item[1], $callbacks[1]) . "<br>";
    # user_func_array
    echo Calculator::calculate($item[0], $item[1], $callbacks[0]) . "<br>";
    # по имени через строку
    echo Calculator::calculate($item[0], $item[1], $callbacks[2]) . "<br>";
    # callback
    echo Calculator::calculate($item[0], $item[1], $callbacks[3]) . "<br>";
}

echo "</pre>";
