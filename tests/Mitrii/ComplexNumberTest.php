<?php

namespace Mitrii;

use PHPUnit\Framework\TestCase;

class ComplexNumberTest extends TestCase
{

    public function test__toString()
    {
        $complex = new ComplexNumber(1, 2, 2);
        $this->assertSame((string) $complex, '1.00+2.00i');

        $complex = new ComplexNumber(3, 4, 4);
        $this->assertSame((string) $complex, '3.0000+4.0000i');
    }

    public function testMul()
    {

    }

    public function testDiv()
    {

    }


    public function testAdd()
    {

    }

    public function testSub()
    {

    }
}
