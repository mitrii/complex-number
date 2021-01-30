<?php


namespace Mitrii;


class AlgebraicExporter implements ExporterInterface
{
    public function export(ComplexNumber $number): string
    {
        return sprintf("%0.{$number->getPrecision()}f%+0.{$number->getPrecision()}fi", $number->getRe(), $number->getIm());
    }
}