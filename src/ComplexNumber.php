<?php
declare(strict_types=1);

namespace Mitrii;

class ComplexNumber
{

    private float $re;

    private float $im;

    private int $precision;

    private ExporterInterface $exporter;

    public function __construct(float $re, float $im, int $precision = 2, ExporterInterface $exporter = null)
    {
        $this->re = $re;
        $this->im = $im;
        $this->precision = $precision;

        if ($exporter === null) {
            $this->exporter = new AlgebraicExporter();
        }
    }

    public function __toString(): string
    {
        return $this->exporter->export($this);
    }

    public function getRe(): float
    {
        return $this->re;
    }

    public function getIm(): float
    {
        return $this->im;
    }

    public function getPrecision(): int
    {
        return $this->precision;
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
        $complexValue = $this->normalize($value);

        $re = (($this->getRe() * $complexValue->getRe()) + ($this->getIm() * $complexValue->getIm()))
            /
            (($complexValue->getRe() ** 2) + ($complexValue->getIm() ** 2));

        $im = (($this->getIm() * $complexValue->getRe()) - ($this->getRe() * $complexValue->getIm()))
            /
            (($complexValue->getRe() ** 2) + ($complexValue->getIm() ** 2));

        return new ComplexNumber($re, $im);
    }

    /**
     * @param ComplexNumber|int|float $value
     * @return ComplexNumber
     */
    public function mul($value): ComplexNumber
    {
        $complexValue = $this->normalize($value);

        $re = ($this->getRe() * $complexValue->getRe()) - ($this->getIm() * $complexValue->getIm());
        $im = ($this->getIm() * $complexValue->getRe()) + ($this->getRe() * $complexValue->getIm());

        return new ComplexNumber($re, $im, $this->precision);
    }
}
