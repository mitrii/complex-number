<?php
declare(strict_types=1);

namespace Mitrii;

class ComplexNumber
{

    private float $re;

    private float $im;

    private int $precision;

    public function __construct(float $re, float $im, int $precision = 2)
    {
        $this->re = $re;
        $this->im = $im;
        $this->precision = $precision;
    }

    public function __toString(): string
    {
        return sprintf("%0.{$this->precision}f%+0.{$this->precision}fi", $this->getRe(), $this->getIm());
    }

    public function getRe(): float
    {
        return $this->re;
    }

    public function getIm(): float
    {
        return $this->im;
    }

    /**
     * @param ComplexNumber|int|float $value
     * @return ComplexNumber
     */
    protected function normalize($value): ComplexNumber
    {
        if ($value instanceof self) {
            return $value;
        }

        return new ComplexNumber((float) $value, 0, $this->precision);
    }

    /**
     * @param ComplexNumber|int|float $value
     * @return ComplexNumber
     */
    public function add($value): ComplexNumber
    {
        $complexValue = $this->normalize($value);

        $re = $this->getRe() + $complexValue->getRe();
        $im = $this->getIm() + $complexValue->getIm();

        return new ComplexNumber($re, $im, $this->precision);
    }

    /**
     * @param ComplexNumber|int|float $value
     * @return ComplexNumber
     */
    public function sub($value): ComplexNumber
    {
        $complexValue = $this->normalize($value);

        $re = $this->getRe() - $complexValue->getRe();
        $im = $this->getIm() - $complexValue->getIm();

        return new ComplexNumber($re, $im, $this->precision);
    }

    /**
     * @param ComplexNumber|int|float $value
     * @return ComplexNumber
     */
    public function div($value): ComplexNumber
    {

    }

    /**
     * @param ComplexNumber|int|float $value
     * @return ComplexNumber
     */
    public function mul($value): ComplexNumber
    {

    }
}
