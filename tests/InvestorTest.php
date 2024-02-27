<?php

use PHPUnit\Framework\TestCase;
use InvestApp\Investor\Investor;
use InvestApp\Tranche\Tranche;

class InvestorTest extends TestCase
{

    public function testSuccessfulInvestment()
    {
        $investor = new Investor(1000);
        $tranche = new Tranche(0.03, 1000);

        $investor->invest($tranche, 500, '05-10-2020');
        $this->assertEquals(500, $investor->getWallet());
    }

    public function testInvestmentWithInsufficientFunds()
    {
        $this->expectException(\Exception::class);

        $investor = new Investor(300);
        $tranche = new Tranche(0.03, 1000);

        $investor->invest($tranche, 500, '05-10-2020');
    }

    public function testMultipleInvestmentsByInvestor()
    {
        $trancheA = new Tranche(0.03, 1000);
        $trancheB = new Tranche(0.06, 1000);

        $investor = new Investor(1000);
        $investor->invest($trancheA, 300, '03-10-2020');
        $investor->invest($trancheB, 200, '04-10-2020');

        $this->assertEquals(500, $investor->getWallet());
    }

    public function testInvestmentWithExactWalletAmount()
    {
        $tranche = new Tranche(0.03, 1000);
        $investor = new Investor(1000);

        $investor->invest($tranche, 1000, '05-10-2020');
        $this->assertEquals(0, $investor->getWallet());
    }
}
