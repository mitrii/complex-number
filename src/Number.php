<?php
declare(strict_types=1);

namespace Mitrii\Complex;

class Number
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
     * @param Number|int|float $value
     * @return Number
     */
    protected function normalize($value): Number
    {
        if ($value instanceof self) {
            return $value;
        }

        return new Number((float) $value, 0, $this->precision);
    }

    /**
     * @param Number|int|float $value
     * @return Number
     */
    public function add($value): Number
    {
        $complexValue = $this->normalize($value);

        $re = $this->getRe() + $complexValue->getRe();
        $im = $this->getIm() + $complexValue->getIm();

        return new Number($re, $im, $this->precision);
    }

    /**
     * @param Number|int|float $value
     * @return Number
     */
    public function sub($value): Number
    {
        $complexValue = $this->normalize($value);

        $re = $this->getRe() - $complexValue->getRe();
        $im = $this->getIm() - $complexValue->getIm();

        return new Number($re, $im, $this->precision);
    }

    /**
     * @param Number|int|float $value
     * @return Number
     */
    public function div($value): Number
    {
        $complexValue = $this->normalize($value);

        $re = (($this->getRe() * $complexValue->getRe()) + ($this->getIm() * $complexValue->getIm()))
            /
            (($complexValue->getRe() ** 2) + ($complexValue->getIm() ** 2));

        $im = (($this->getIm() * $complexValue->getRe()) - ($this->getRe() * $complexValue->getIm()))
            /
            (($complexValue->getRe() ** 2) + ($complexValue->getIm() ** 2));

        return new Number($re, $im);
    }

    /**
     * @param Number|int|float $value
     * @return Number
     */
    public function mul($value): Number
    {
        $complexValue = $this->normalize($value);

        $re = ($this->getRe() * $complexValue->getRe()) - ($this->getIm() * $complexValue->getIm());
        $im = ($this->getIm() * $complexValue->getRe()) + ($this->getRe() * $complexValue->getIm());

        return new Number($re, $im, $this->precision);
    }
}
