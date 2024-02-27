<?php

namespace InvestApp\Investment;

use InvestApp\Investor\Investor;
use InvestApp\Tranche\Tranche;

class Investment
{
    private $investor;
    private $tranche;
    private $amount;
    private $date;

    public function __construct(Investor $investor, Tranche $tranche, $amount, $date)
    {
        $this->investor = $investor;
        $this->tranche = $tranche;
        $this->amount = $amount;
        $this->date = new \DateTime($date);
    }

    public function calculateInterest($endDate)
    {
        $endDate = new \DateTime($endDate);
        $investmentDate = $this->date;

        // Calculate the number of days from the investment date to the end of the month
        $daysInMonth = $endDate->format('t');
        $daysInvested = min($daysInMonth - $investmentDate->format('j') + 1, $endDate->format('j'));

        // Calculate interest
        $interest = ($this->amount * $this->tranche->getInterestRate() / $daysInMonth) * $daysInvested;
        return $interest;
    }
}
