<?php

namespace App;

class Calculate
{
    protected $devise;
    protected $commisionAmount = 1;

    public function setDevise($value)
    {
        $this->devise = $value;
    }

    public function setCommisionAmount($value)
    {
        $this->commisionAmount = $value;
    }

    public function encaissementEuro(array $arrayValues)
    {
        $total = 0;
        foreach ($arrayValues as $amount) {
            if ($this->isCommissionSampled($amount)) {
                $total += $this->commisionAmount;
            }
            $total += $amount;
        }
        return round($total / $this->devise, 2);
    }

    public function isCommissionSampled($amount)
    {
        return $amount < 100 ? true : false;
    }
}