<?php
declare(strict_types=1);

namespace Mitrii\Complex;


class TrigonometricExporter implements ExporterInterface
{
    private function getR(Number $number)
    {
        return sprintf("sqrt(%0.{$number->getPrecision()}f", sqrt($number->getRe()**2 + $number->getIm()**2));
    }

    private function getFi(Number $number): string
    {
       return '';
    }

    public function export(Number $number): string
    {
        return sprintf('%s*(cos(%s)+isin(%s))', $this->getR($number), $this->getFi(), $this->getFi());
    }
}