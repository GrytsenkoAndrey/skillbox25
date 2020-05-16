<?php

/**
 * Created by PhpStorm.
 * User: APG
 * Date: 16.05.2020
 * Time: 15:18
 */
class ClosureExample
{
    private $value = 0;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    private function getValue()
    {
        return $this->value;
    }

    public function formatValue(Closure $closure)
    {
        # call - метод класса Closure с параметром  ќЌ“≈ —“, возвращает указатель на данный класс
        return $closure->call($this);
    }
}
/*
 * есть анонима€ функци€ где используем укзаать "этот"
 * внутри функции нет указател€ "этот"
 *
 * создадим объект класса  лозуре
 * передаем анонимную функцию
 * эта функци€ автоматически оборачиваетс€ в класс  ложур и становитс€ экземпл€ром класса  ложур
 * у которого есть метод call с параметром - контекст, то есть вызываем ан.функцию в контексте класса  ложурЁкземпл
 *
 */
$formatter = function () {
    return sprintf('format %01.2f$ ', $this->getValue());
};

$ex = new ClosureExample(5);
echo $ex->formatValue($formatter);