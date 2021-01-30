<?php

namespace Mitrii\Complex;

use PHPUnit\Framework\TestCase;

class NumberTest extends TestCase
{

    public function test__toString()
    {
        $complex = new Number(1, 2, 2);
        self::assertSame((string) $complex, '1.00+2.00i', 'Return as string');

        $complex = new Number(3, -4, 4);
        self::assertSame((string) $complex, '3.0000-4.0000i');

        $complex = new Number(1.4556, 2.6149);
        self::assertSame((string) $complex, '1.46+2.61i');

        $complex = new Number(1.4556, 2.6149, 3);
        self::assertSame((string) $complex, '1.456+2.615i');
    }

    public function testMul()
    {
        $complex = new Number(1, 2, 2);
        $complex2 = $complex->mul(3);
        self::assertSame((string) $complex2, '3.00+6.00i', 'Multiplication integer to complex number');

        $complex = new Number(1.45, 2.61, 2);
        $complex2 = new Number(3.45, 4.48, 2);
        $complex3 = $complex->mul($complex2);
        self::assertSame((string) $complex3, '-6.69+15.50i', 'Multiplication complex to complex number');

        $complex = new Number(-1.45, 2.61, 2);
        $complex2 = new Number(3.45, -4.48, 2);
        $complex3 = $complex->mul($complex2);
        self::assertSame((string) $complex3, '6.69+15.50i', 'Multiplication complex to complex number');
    }

    public function testDiv()
    {
        $complex = new Number(1, 2, 2);
        $complex2 = $complex->div(3);
        self::assertSame((string) $complex2, '0.33+0.67i', 'Division integer to complex number');

        $complex = new Number(1.45, 2.61, 2);
        $complex2 = new Number(3.45, 4.48, 2);
        $complex3 = $complex->div($complex2);
        self::assertSame((string) $complex3, '0.52+0.08i', 'Division complex to complex number');

        $complex = new Number(-1.45, 2.61, 2);
        $complex2 = new Number(3.45, -4.48, 2);
        $complex3 = $complex->div($complex2);
        self::assertSame((string) $complex3, '-0.52+0.08i', 'Division complex to complex number');
    }


    public function testAdd()
    {
        $complex = new Number(1, 2, 2);
        $complex2 = $complex->add(3);
        self::assertSame((string) $complex2, '4.00+2.00i', 'Addition integer to complex number');

        $complex = new Number(1.45, 2.61, 2);
        $complex2 = new Number(3.45, 4.48, 2);
        $complex3 = $complex->add($complex2);
        self::assertSame((string) $complex3, '4.90+7.09i', 'Addition complex to complex number');

        $complex = new Number(-1.45, 2.61, 2);
        $complex2 = new Number(3.45, -4.48, 2);
        $complex3 = $complex->add($complex2);
        self::assertSame((string) $complex3, '2.00-1.87i', 'Addition complex to complex number');
    }

    public function testSub()
    {
        $complex = new Number(1, 2, 2);
        $complex2 = $complex->sub(3);
        self::assertSame((string) $complex2, '-2.00+2.00i', 'Subtraction integer to complex number');

        $complex = new Number(1.45, 2.61, 2);
        $complex2 = new Number(3.45, 4.48, 2);
        $complex3 = $complex->sub($complex2);
        self::assertSame((string) $complex3, '-2.00-1.87i', 'Subtraction complex to complex number');

        $complex = new Number(-1.45, 2.61, 2);
        $complex2 = new Number(3.45, -4.48, 2);
        $complex3 = $complex->sub($complex2);
        self::assertSame((string) $complex3, '-4.90+7.09i', 'Subtraction complex to complex number');
    }
}