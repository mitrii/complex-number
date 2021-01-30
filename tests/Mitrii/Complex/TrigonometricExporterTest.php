<?php

namespace Mitrii\Complex;

use PHPUnit\Framework\TestCase;

class TrigonometricExporterTest extends TestCase
{

    public function testExport()
    {
        $complex = new Number(-1,-4);
        $exporter = new TrigonometricExporter();
        self::assertSame('sqrt(17.00)*(cos(pi+arctg(4.00))+isin(pi+arctg(4.00)))', $exporter->export($complex));

        $complex = new Number(-2,4);
        $exporter = new TrigonometricExporter();
        self::assertSame('sqrt(20.00)*(cos(pi+arctg(-2.00))+isin(pi+arctg(-2.00)))', $exporter->export($complex));
    }
}
