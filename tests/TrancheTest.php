<?php

use PHPUnit\Framework\TestCase;
use InvestApp\Tranche\Tranche;
use InvestApp\Investor\Investor;

class TrancheTest extends TestCase
{
    public function testInvestmentWithinLimit()
    {
        $tranche = new Tranche(0.03, 1000);
        $investor = new Investor(1000);
        
        $tranche->invest($investor, 500, '05-10-2020');
        $this->assertEquals(500, $tranche->getCurrentAmountInvested());
    }

    public function testInvestmentExceedingLimit()
    {
        $this->expectException(\Exception::class);

        $tranche = new Tranche(0.03, 1000);
        $investor = new Investor(1000);
        
        $tranche->invest($investor, 1500, '05-10-2020');
    }
    
    public function testMultipleInvestments()
{
    $investor1 = new Investor(1000);
    $investor2 = new Investor(1000);
    $tranche = new Tranche(0.03, 1000);
    
    $tranche->invest($investor1, 300, '03-10-2020');
    $tranche->invest($investor2, 500, '04-10-2020');

    $this->assertEquals(800, $tranche->getCurrentAmountInvested());
}

public function testInvestmentOnDifferentDates()
{
    $investor = new Investor(1000);
    $tranche = new Tranche(0.03, 1000);

    $tranche->invest($investor, 300, '03-10-2020');
    $tranche->invest($investor, 300, '10-10-2020');

    $this->assertEquals(600, $tranche->getCurrentAmountInvested());
}
}
