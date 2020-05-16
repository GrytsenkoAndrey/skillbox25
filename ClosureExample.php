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
        # call - ����� ������ Closure � ���������� ��������, ���������� ��������� �� ������ �����
        return $closure->call($this);
    }
}
/*
 * ���� �������� ������� ��� ���������� ������� "����"
 * ������ ������� ��� ��������� "����"
 *
 * �������� ������ ������ �������
 * �������� ��������� �������
 * ��� ������� ������������� ������������� � ����� ������ � ���������� ����������� ������ ������
 * � �������� ���� ����� call � ���������� - ��������, �� ���� �������� ��.������� � ��������� ������ �������������
 *
 */
$formatter = function () {
    return sprintf('format %01.2f$ ', $this->getValue());
};

$ex = new ClosureExample(5);
echo $ex->formatValue($formatter);