<?php

namespace App\Tests\Unit\Entity;

use App\Entity\Dinosaur;
use App\Enum\HealthStatus;
use Generator;
use PHPUnit\Framework\TestCase;

class DinosaurTest extends TestCase
{

    public function testCanGetAndSetData(): void
    {
        $dino = new Dinosaur(
            name: 'Dino',
            genus: 'Tyrant',
            length: 11,
            enclosure: 'alo'
        );
        self::assertSame('Dino', $dino->getName());
        self::assertSame('Tyrant', $dino->getGenus());
        self::assertSame(
            11,
            $dino->getLength(),
            'Dino is asdf'
        );
        self::assertSame('alo', $dino->getEnclosure());
    }



    /**
     * @dataProvider sizeDescriptionProvider
     * @param int $length
     * @param string $expectedSize
     * @return void
     */
    public function testDinoHasCorrectSizeDescriptionFromLength(int $length, string $expectedSize)
    {
        $dino = new Dinosaur(name:'Big eaty', length:$length);
        self::assertSame($expectedSize, $dino->getSizeDescription());
    }



    public function sizeDescriptionProvider(): Generator
    {
        yield [10, 'Large'];
        yield [5, 'Medium'];
        yield [4, 'Small'];
    }


    public function testIsAcceptingVisitorsByDefault(): void
    {
        $dino = new Dinosaur('Dennis');
        self::assertTrue($dino->isAcceptingVisitors());
    }


    public function testIsAcceptingVisitorsIfSick(): void
    {
        $dino = new Dinosaur('Bumpy');
        $dino->setHealth(HealthStatus::SICK);

        self::assertFalse($dino->isAcceptingVisitors());
    }

}
