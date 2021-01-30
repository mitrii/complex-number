<?php


namespace Mitrii\Complex;


interface ExporterInterface
{
    public function export(Number $number): string;
}