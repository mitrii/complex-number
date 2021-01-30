<?php


namespace Mitrii\Complex;


class AlgebraicExporter implements ExporterInterface
{
    public function export(Number $number): string
    {
        return sprintf("%0.{$number->getPrecision()}f%+0.{$number->getPrecision()}fi", $number->getRe(), $number->getIm());
    }
}