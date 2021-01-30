<?php


namespace Mitrii;


interface ExporterInterface
{
    public function export(ComplexNumber $number): string;
}