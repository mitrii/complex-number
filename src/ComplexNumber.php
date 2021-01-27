<?php

namespace Mitrii;

class ComplexNumber
{

    private float $re;

    private float $im;

    private int $precision;

    public function __construct(float $re, float $im, $precision = 2)
    {
        $this->re = $re;
        $this->im = $im;
        $this->precision = $precision;
    }

    public function __toString(): string
    {
        return sprintf("%0.{$this->precision}f%+0.{$this->precision}fi", $this->re, $this->im);
    }

    public function add($value): ComplexNumber
    {

    }


    public function sub($value): ComplexNumber
    {

    }

    public function div($value): ComplexNumber
    {

    }

    public function mul($value): ComplexNumber
    {

    }
}