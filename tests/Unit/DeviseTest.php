<?php

declare(strict_types =1);

namespace Tests;

use App\Calculate;

/*
Aujourd'hui, nos clients peuvent acheter des dollars au taux de : 1 euro = 1.16 dollars

En outre, une commission de 1 euro est encaissée pour chaque transaction inférieure à 100 euros.

Ecrire, en PHP ou en JS (selon votre préférence), une fonction nommée "encaissementEuro" qui prend le tableau des montants en dollars et qui retourne le total des euros encaissés.

Par exemple :

encaissementEuro([100, 150, 30, 80]) retourne 312.35
*/


use PHPUnit\Framework\TestCase;

class DeviseTest extends TestCase
{

    private  $calculate;

    public function setup() :void
    {
        $this->calculate = new Calculate();
        $this->calculate->setDevise(1.16);
        $this->calculate->setCommisionAmount(1);
    }

    public function testTransactionoOf100ShouldReturn116()
    {
        $this->assertEquals(100, $this->calculate->encaissementEuro([116]));
    }

    public function testCommisionShouldBeTriggeredIfTransactionIsLessThan100()
    {
        $this->assertEquals(true, $this->calculate->isCommissionSampled(80));
    }

    public function testCommisionShouldBeAddedToTransaction()
    {
        $this->assertEquals(69.83, $this->calculate->encaissementEuro([80]));
    }

    public function testEncaissementFromTheExercice()
    {
        $this->assertEquals(312.07, $this->calculate->encaissementEuro([100, 150, 30, 80]));
    }
}