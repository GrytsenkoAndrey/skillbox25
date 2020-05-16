<?php
/**
 * Created by PhpStorm.
 * User: APG
 * Date: 16.05.2020
 * Time: 15:06
 */

# help  function
function test($name, callable $callback)
{
    echo 'invoke: ' . $callback($name) . PHP_EOL;
    echo 'user_func: ' . call_user_func_array($callback, [$name]) . PHP_EOL;
}

class SayHello
{
    public static function helloStatic($name = '')
    {
        return 'Say hello from static ' . $name . PHP_EOL;
    }

    public function hello($name = '')
    {
        return 'Say hello from pubf ' . $name . PHP_EOL;
    }
}
/*
# string like
function simpleHello($name = '')
{
    return 'Simple Hello to : ' . $name;
}

echo "<pre>";
test('World', 'simpleHello');

# anonym like
test('Anonym', function($name) {
    return 'Hello to : ' . $name . PHP_EOL;
});
*/
echo "<pre>";

# object and array
$obj = new SayHello();
# 1 им€ и им€ класса и им€ статичного публичного метода
test('Static', [SayHello::class, 'helloStatic']);
#2 создать экземпл€р класса и передать
test('NonStatic', [$obj, 'hello']);



echo "</pre>";