<?php

use App\Repository\LockDownRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class LockDownRepositoryTest extends KernelTestCase
{

    public function testIsInLockDownWithNoLockDownRows()
    {
        self::bootKernel();

        $lockDownRepository = self::getContainer()->get(LockDownRepository::class);

        assert($lockDownRepository instanceof LockDownRepository);

        $this->assertFalse($lockDownRepository->isInLockDown());
    }

}
