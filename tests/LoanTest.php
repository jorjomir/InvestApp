<?php

use PHPUnit\Framework\TestCase;
use InvestApp\Loan\Loan;
use InvestApp\Tranche\Tranche;

class LoanTest extends TestCase
{
    private $loan;

    protected function setUp(): void
    {
        $this->loan = new Loan('01-10-2020', '15-11-2020');
    }
    
    public function testAddTranche()
    {
        $tranche = new Tranche(0.03, 1000);
        $this->loan->addTranche($tranche);
        $this->assertContains($tranche, $this->loan->getTranches());
    }
}