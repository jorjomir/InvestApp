<?php

namespace InvestApp\Investor;

use InvestApp\Tranche\Tranche;
use InvestApp\Investment\Investment;

class Investor
{
    private $wallet;
    private $investments = [];

    public function __construct($wallet)
    {
        $this->wallet = $wallet;
    }

    public function invest(Tranche $tranche, $amount, $date)
    {
        if ($this->wallet < $amount) {
            throw new \Exception("Insufficient funds in wallet.");
        }

        $this->wallet -= $amount;
        $investment = new Investment($this, $tranche, $amount, $date);
        $this->investments[] = $investment;
        $tranche->invest($this, $amount, $date);
        
        return $investment;
    }

    public function getWallet()
    {
        return $this->wallet;
    }

    public function getInvestments()
    {
        return $this->investments;
    }

    public function calculateTotalInterest($endDate)
    {
        $totalInterest = 0;
        foreach ($this->investments as $investment) {
            $totalInterest += $investment->calculateInterest($endDate);
        }
        return $totalInterest;
    }
}
