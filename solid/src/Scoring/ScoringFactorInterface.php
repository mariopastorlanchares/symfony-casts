<?php

namespace App\Scoring;

use App\Entity\BigFootSighting;

interface ScoringFactorInterface
{

    public function score(BigFootSighting $sighting): int;

}