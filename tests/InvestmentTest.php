<?php

use PHPUnit\Framework\TestCase;
use InvestApp\Investment\Investment;
use InvestApp\Investor\Investor;
use InvestApp\Tranche\Tranche;

class InvestmentTest extends TestCase
{
    public function testInterestCalculation()
    {
        $investor = new Investor(1000);
        $tranche = new Tranche(0.03, 1000);
        $investment = new Investment($investor, $tranche, 1000, '01-10-2020');

        $interest = $investment->calculateInterest('31-10-2020');
        $this->assertEquals(30.00, $interest); // Replace with expected interest
    }
    
}
