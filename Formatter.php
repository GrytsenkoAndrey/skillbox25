<?php

/**
 * Created by PhpStorm.
 * User: APG
 * Date: 16.05.2020
 * Time: 15:30
 */
interface Formatter
{
    public function format($value);
}

function format($value, Formatter $formatter)
{
    echo $formatter->format($value) . PHP_EOL;
}

# необходимо уникальное форматирование
$tCl = new class implements Formatter {
    public function format($value)
    {
        return sprintf("Price %01.4f$ ", $value);
    }
};

format(10, $tCl);

