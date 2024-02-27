<?php

namespace InvestApp\Loan;

use InvestApp\Tranche\Tranche;

class Loan
{
    private $startDate;
    private $endDate;
    private $tranches = [];

    public function __construct($startDate, $endDate)
    {
        $this->startDate = new \DateTime($startDate);
        $this->endDate = new \DateTime($endDate);
    }

    public function addTranche(Tranche $tranche)
    {
        $this->tranches[] = $tranche;
    }

    public function getTranches()
    {
        return $this->tranches;
    }
}
