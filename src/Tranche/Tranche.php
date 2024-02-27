<?php

namespace InvestApp\Tranche;

use InvestApp\Interfaces\Investable;
use InvestApp\Investor\Investor;
use InvestApp\Investment\Investment;

class Tranche implements Investable
{
    private $interestRate;
    private $maxAmount;
    private $investments = [];
    private $currentAmount = 0;

    public function __construct($interestRate, $maxAmount)
    {
        $this->interestRate = $interestRate;
        $this->maxAmount = $maxAmount;
    }

    public function invest(Investor $investor, $amount, $date)
    {
        if ($this->currentAmount + $amount > $this->maxAmount) {
            throw new \Exception("Investment amount exceeds the maximum limit of this tranche.");
        }
        
        $investment = new Investment($investor, $this, $amount, $date);
        $this->investments[] = $investment;
        $this->currentAmount += $amount;

        return $investment;
    }

    public function getCurrentAmountInvested()
    {
        return $this->currentAmount;
    }

    public function getInterestRate()
    {
        return $this->interestRate;
    }
}
