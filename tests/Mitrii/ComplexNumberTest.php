<?php

namespace Mitrii;

use PHPUnit\Framework\TestCase;

class ComplexNumberTest extends TestCase
{

    public function test__toString()
    {
        $complex = new ComplexNumber(1, 2, 2);
        self::assertSame((string) $complex, '1.00+2.00i', 'Return as string');

        $complex = new ComplexNumber(3, -4, 4);
        self::assertSame((string) $complex, '3.0000-4.0000i');
    }

    public function testMul()
    {
        $complex = new ComplexNumber(1, 2, 2);
        $complex2 = $complex->mul(3);
        self::assertSame((string) $complex2, '3.00+6.00i', 'Multiplication integer to complex number');

        $complex = new ComplexNumber(1.45, 2.61, 2);
        $complex2 = new ComplexNumber(3.45, 4.48, 2);
        $complex3 = $complex->mul($complex2);
        self::assertSame((string) $complex3, '-6.69+15.50', 'Multiplication complex to complex number');

        $complex = new ComplexNumber(-1.45, 2.61, 2);
        $complex2 = new ComplexNumber(3.45, -4.48, 2);
        $complex3 = $complex->mul($complex2);
        self::assertSame((string) $complex3, '6.69+15.50i', 'Multiplication complex to complex number');
    }

    public function testDiv()
    {
        $complex = new ComplexNumber(1, 2, 2);
        $complex2 = $complex->div(3);
        self::assertSame((string) $complex2, '0.33+0.66i', 'Division integer to complex number');

        $complex = new ComplexNumber(1.45, 2.61, 2);
        $complex2 = new ComplexNumber(3.45, 4.48, 2);
        $complex3 = $complex->div($complex2);
        self::assertSame((string) $complex3, '0.52+0.07i', 'Division complex to complex number');

        $complex = new ComplexNumber(-1.45, 2.61, 2);
        $complex2 = new ComplexNumber(3.45, -4.48, 2);
        $complex3 = $complex->div($complex2);
        self::assertSame((string) $complex3, '-0.52+0.07i', 'Division complex to complex number');
    }


    public function testAdd()
    {
        $complex = new ComplexNumber(1, 2, 2);
        $complex2 = $complex->add(3);
        self::assertSame((string) $complex2, '4.00+2.00i', 'Addition integer to complex number');

        $complex = new ComplexNumber(1.45, 2.61, 2);
        $complex2 = new ComplexNumber(3.45, 4.48, 2);
        $complex3 = $complex->add($complex2);
        self::assertSame((string) $complex3, '4.90+7.09i', 'Addition complex to complex number');

        $complex = new ComplexNumber(-1.45, 2.61, 2);
        $complex2 = new ComplexNumber(3.45, -4.48, 2);
        $complex3 = $complex->add($complex2);
        self::assertSame((string) $complex3, '2.00-1.87i', 'Addition complex to complex number');
    }

    public function testSub()
    {
        $complex = new ComplexNumber(1, 2, 2);
        $complex2 = $complex->sub(3);
        self::assertSame((string) $complex2, '-2.00+2.00i', 'Subtraction integer to complex number');

        $complex = new ComplexNumber(1.45, 2.61, 2);
        $complex2 = new ComplexNumber(3.45, 4.48, 2);
        $complex3 = $complex->sub($complex2);
        self::assertSame((string) $complex3, '-2.00-1.87i', 'Subtraction complex to complex number');

        $complex = new ComplexNumber(-1.45, 2.61, 2);
        $complex2 = new ComplexNumber(3.45, -4.48, 2);
        $complex3 = $complex->sub($complex2);
        self::assertSame((string) $complex3, '-4.90+7.09i', 'Subtraction complex to complex number');
    }
}
