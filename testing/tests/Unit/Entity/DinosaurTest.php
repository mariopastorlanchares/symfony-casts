<?php

namespace App\Tests\Unit\Entity;

use App\Entity\Dinosaur;
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

    public function testDinosaurOver10MetersOrGreaterIsLarge()
    {
        $dino = new Dinosaur(name:'Big eaty', length:10);
        self::assertSame('Large', $dino->getSizeDescription(), 'This is supposed to be a large dinosaur');
    }

    public function testDinoBetween5And9MetersIsMedium()
    {
        $dino = new Dinosaur(name:'Big eaty', length:5);
        self::assertSame('Medium', $dino->getSizeDescription(), 'This is supposed to be a medium dinosaur');
    }


    public function testDinoUnder5MetersIsSmall(): void
    {
        $dino = new Dinosaur(name: 'Big Eaty', length: 4);
        self::assertSame('Small', $dino->getSizeDescription(), 'This is supposed to be a small Dinosaur');
    }


}
