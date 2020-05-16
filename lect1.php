<?php
/**
 * Created by PhpStorm.
 * User: APG
 * Date: 16.05.2020
 * Time: 11:33
 */


set_exception_handler(function (Throwable $e) {
    echo 'Was not caught ' . $e->getMessage();
});




/*
class BadValueException extends \InvalidArgumentException
{

}

class TooBigValueException extends BadValueException
{

}
class NegativeValueException extends BadValueException {}

function arithOper($a, $b)
{
    if ($a < 0 || $b < 0) {
        throw new NegativeValueException('a < 0 || b < 0');
    }

    if ($a <= $b) {
        throw new TooBigValueException('a <= b');
    }

    if ($b == 0) {
        throw new \InvalidArgumentException('b == 0');
    }

    return $a / $b;
}

$values = [
    ['a' => 0, 'b' => 2],
    ['a' => -1, 'b' => -3],
    ['a' => 10, 'b' => 0],
    ['a' => 3, 'b' => 1],
];

echo "<pre>";

foreach ($values as $item) {
    try {
        try {
            echo 'a = ' . $item['a'] . ' b = ' . $item['b'] . ' ';
            $c = arithOper($item['a'], $item['b']);
            echo 'Result is ' . $c . "<br>";
        } catch (BadValueException $e) {
            echo 'values problem ' . $e->getMessage() . PHP_EOL;
        }
    } catch (Exception $e) {
        echo 'Log error ' . $e->getMessage() . PHP_EOL;
    }
}
echo "</pre>";

echo 'THE END';


throw new Exception('Some error', 300);

echo "THE END";
*/

/*
try {
    throw new RuntimeException('Error is here', 300);

    echo 'Error is not came ' . PHP_EOL;
} catch (RuntimeException $e) {
    echo 'Runtime error : ' . $e->getMessage()  . PHP_EOL;
} catch (Exception $e) {
    echo 'Error is: ' . $e->getMessage()  . PHP_EOL;
} finally {
    echo 'The line is always ' . PHP_EOL;
}

echo 'THE END';



try {
    throw new Exception('Error is here', 300);

    echo 'Error is not came ' . PHP_EOL;
} catch (Exception $e) {
    echo 'Error is: ' . $e->getMessage()  . PHP_EOL;
} finally {
    echo 'The line is always ' . PHP_EOL;
}

echo 'THE END';*/
