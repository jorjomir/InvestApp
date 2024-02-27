<?php

namespace InvestApp\Interfaces;

use InvestApp\Investor\Investor;

interface Investable
{
    public function invest(Investor $investor, $amount, $date);
}
