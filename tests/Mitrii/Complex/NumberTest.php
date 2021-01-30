<?php

namespace Mitrii\Complex;

use PHPUnit\Framework\TestCase;

class NumberTest extends TestCase
{

    public function test__toString()
    {
        $complex = new Number(1, 2, 2);
        self::assertSame( '1.00+2.00i', (string) $complex, 'Return as string');

        $complex = new Number(3, -4, 4);
        self::assertSame( '3.0000-4.0000i', (string) $complex);

        $complex = new Number(1.4556, 2.6149);
        self::assertSame( '1.46+2.61i', (string) $complex);

        $complex = new Number(1.4556, 2.6149, 3);
        self::assertSame( '1.456+2.615i', (string) $complex);

        $complex = new Number(0, 0);
        self::assertSame('0', (string) $complex);
    }

    public function testMul()
    {
        $complex = new Number(1, 2, 2);
        $complex2 = $complex->mul(3);
        self::assertSame( '3.00+6.00i', (string) $complex2, 'Multiplication integer to complex number');

        $complex = new Number(1.45, 2.61, 2);
        $complex2 = new Number(3.45, 4.48, 2);
        $complex3 = $complex->mul($complex2);
        self::assertSame( '-6.69+15.50i', (string) $complex3, 'Multiplication complex to complex number');

        $complex = new Number(-1.45, 2.61, 2);
        $complex2 = new Number(3.45, -4.48, 2);
        $complex3 = $complex->mul($complex2);
        self::assertSame( '6.69+15.50i', (string) $complex3, 'Multiplication complex to complex number');
    }

    public function testDiv()
    {
        $complex = new Number(1, 2, 2);
        $complex2 = $complex->div(3);
        self::assertSame('0.33+0.67i', (string) $complex2, 'Division integer to complex number');

        $complex = new Number(1.45, 2.61, 2);
        $complex2 = new Number(3.45, 4.48, 2);
        $complex3 = $complex->div($complex2);
        self::assertSame('0.52+0.08i', (string) $complex3, 'Division complex to complex number');

        $complex = new Number(-1.45, 2.61, 2);
        $complex2 = new Number(3.45, -4.48, 2);
        $complex3 = $complex->div($complex2);
        self::assertSame( '-0.52+0.08i', (string) $complex3, 'Division complex to complex number');
    }


    public function testAdd()
    {
        $complex = new Number(1, 2, 2);
        $complex2 = $complex->add(3);
        self::assertSame( '4.00+2.00i', (string) $complex2, 'Addition integer to complex number');

        $complex = new Number(1.45, 2.61, 2);
        $complex2 = new Number(3.45, 4.48, 2);
        $complex3 = $complex->add($complex2);
        self::assertSame( '4.90+7.09i', (string) $complex3, 'Addition complex to complex number');

        $complex = new Number(-1.45, 2.61, 2);
        $complex2 = new Number(3.45, -4.48, 2);
        $complex3 = $complex->add($complex2);
        self::assertSame( '2.00-1.87i', (string) $complex3,'Addition complex to complex number');
    }

    public function testSub()
    {
        $complex = new Number(1, 2, 2);
        $complex2 = $complex->sub(3);
        self::assertSame( '-2.00+2.00i', (string) $complex2, 'Subtraction integer to complex number');

        $complex = new Number(1.45, 2.61, 2);
        $complex2 = new Number(3.45, 4.48, 2);
        $complex3 = $complex->sub($complex2);
        self::assertSame( '-2.00-1.87i', (string) $complex3, 'Subtraction complex to complex number');

        $complex = new Number(-1.45, 2.61, 2);
        $complex2 = new Number(3.45, -4.48, 2);
        $complex3 = $complex->sub($complex2);
        self::assertSame( '-4.90+7.09i', (string) $complex3, 'Subtraction complex to complex number');
    }
}
