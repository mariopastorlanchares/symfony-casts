<?php

use App\Repository\LockDownRepository;
use PHPUnit\Framework\TestCase;

class LockDownRepositoryTest extends TestCase
{

    public function testIsInLockDownWithNoLockDownRows()
    {

        $repository = new LockDownRepository();
    }

}
