<?php
declare(strict_types=1);

namespace Mitrii\Complex;


class TrigonometricExporter implements ExporterInterface
{

    private function getR(Number $number)
    {
        return sprintf("sqrt(%0.{$number->getPrecision()}f)", $number->getRe()**2 + $number->getIm()**2);
    }

    public function export(Number $number): string
    {
        if ($number->getRe() === 0.0 && $number->getIm() === 0.0) {
            return '0';
        }

        return sprintf('%s*(cos(phi)+isin(phi))', $this->getR($number));
    }
}