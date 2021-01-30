<?php
declare(strict_types=1);

namespace Mitrii\Complex;


class AlgebraicExporter implements ExporterInterface
{
    public function export(Number $number): string
    {
        if ($number->getRe() === 0.0 && $number->getIm() === 0.0) {
            return '0';
        }

        return sprintf("%0.{$number->getPrecision()}f%+0.{$number->getPrecision()}fi", $number->getRe(), $number->getIm());
    }
}