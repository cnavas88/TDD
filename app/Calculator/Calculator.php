<?php namespace App\Calculator;

class Calculator
{
    protected $result = 0;

    public function getResult()
    {
        return $this->result;
    }

    public function add()
    {
        $this->calculateAll(func_get_args(), '+');
    }

    public function substract()
    {
        $this->calculateAll(func_get_args(), '-');
    }

    protected function calculateAll(array $numbers, $symbol)
    {
        foreach ($numbers as $number)
        {
            $this->calculate($number, $symbol);
        }
    }

    protected function calculate($number, $symbol)
    {
        if (! is_numeric($number))
        {
            throw new \InvalidArgumentException('This is not a number.');
        }

        switch ($symbol)
        {
            case '+':
                $this->result += $number;
                break;
            case '-':
                $this->result -= $number;
                break;
        }
    }
}