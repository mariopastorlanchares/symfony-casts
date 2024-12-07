<?php

namespace App\Scoring;

use App\Entity\BigFootSighting;

interface ScoringFactorInterface
{

    public function score(BigFootSighting $sighting): int;

    public function adjustScore(int $finalScore, BigFootSighting $sighting): int;
}
