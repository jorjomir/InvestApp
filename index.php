<?php
require 'vendor/autoload.php';

use InvestApp\Loan\Loan;
use InvestApp\Tranche\Tranche;
use InvestApp\Investor\Investor;

$loan = new Loan('01-10-2020', '15-11-2020');
$trancheA = new Tranche(0.03, 1000);
$trancheB = new Tranche(0.06, 1000);

$loan->addTranche($trancheA);
$loan->addTranche($trancheB);

$investor1 = new Investor(1000);
$investor2 = new Investor(1000);
$investor3 = new Investor(1000);
$investor4 = new Investor(1100);

// Investor 1 invests on 03/10/2020
try {
    $investor1->invest($trancheA, 1000, '03-10-2020');
    echo "Investor 1 investment successful.\n";
} catch (Exception $e) {
    echo "Investor 1 investment failed: " . $e->getMessage() . "\n";
}

// Investor 2 tries to invest on 04/10/2020
try {
    $investor2->invest($trancheA, 1, '04-10-2020');
    echo "Investor 2 investment successful.\n";
} catch (Exception $e) {
    echo "Investor 2 investment failed: " . $e->getMessage() . "\n";
}

// Investor 3 invests on 10/10/2020
try {
    $investor3->invest($trancheB, 500, '10-10-2020');
    echo "Investor 3 investment successful.\n";
} catch (Exception $e) {
    echo "Investor 3 investment failed: " . $e->getMessage() . "\n";
}

// Investor 4 tries to invest on 25/10/2020
try {
    $investor4->invest($trancheB, 1100, '25-10-2020');
    echo "Investor 4 investment successful.\n";
} catch (Exception $e) {
    echo "Investor 4 investment failed: " . $e->getMessage() . "\n";
}

// Calculate interests for Investor 1 and 3
$investor1Earnings = $investor1->calculateTotalInterest('31-10-2020');
$investor3Earnings = $investor3->calculateTotalInterest('31-10-2020');

echo "Investor 1 earns: " . number_format($investor1Earnings, 2) . " pounds\n";
echo "Investor 3 earns: " . number_format($investor3Earnings, 2) . " pounds\n";