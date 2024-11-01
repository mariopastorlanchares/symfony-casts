<?php

namespace Service;

use App\Enum\LockDownStatus;
use App\Factory\LockDownFactory;
use App\Service\GithubService;
use App\Service\LockDownHelper;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Zenstruck\Foundry\Test\Factories;
use Zenstruck\Foundry\Test\ResetDatabase;

class LockDownHelperTest extends KernelTestCase
{
    use ResetDatabase, Factories;

    public function testEndCurrentLockdown()
    {
        self::bootKernel();
        $lockDown = LockDownFactory::createOne([
            'status' => LockDownStatus::ACTIVE,
        ]);

        $gitHubService = $this->createMock(GithubService::class);
        $gitHubService->expects($this->once())
            ->method('clearLockDownAlerts');

        self::getContainer()->set(GithubService::class, $gitHubService);

        $lockDownHelper = $this->getLockDownHelper();
        $lockDownHelper->endCurrentLockDown();
        $this->assertSame(LockDownStatus::ENDED, $lockDown->getStatus());
    }


    public function testDinoEscapedPersistLockDown()
    {
        self::bootKernel();
        $this->getLockDownHelper()->dinoEscaped();
        LockDownFactory::repository()->assert()->count(1);
    }

    public function getLockDownHelper(): LockDownHelper
    {

        return self::getContainer()->get(LockDownHelper::class);

    }

}
