<?php

declare(strict_types=1);

namespace Faissaloux\PestMath;

use Pest\Expectation as PestExpectation;

class Expectation
{
    public function __construct(private int $value) {}

    public function toBeDivisibleBy(int $divisor): PestExpectation
    {
        return expect($this->value % $divisor === 0)->toBeTrue();
    }

    public function toBeEven(): PestExpectation
    {
        return expect($this->value % 2 === 0)->toBeTrue();
    }

    public function toBeOdd(): PestExpectation
    {
        return expect($this->value % 2 !== 0)->toBeTrue();
    }

    public function toBePrime(): PestExpectation
    {
        if ($this->value === 1) {
            return expect(true)->toBeFalse();
        }

        for ($i = 2; $i < $this->value; $i++) {
            if ($this->value % $i == 0) {
                return expect(true)->toBeFalse();
            }
        }

        return expect(true)->toBeTrue();
    }

    public function toBePowerOf(int $number): PestExpectation
    {
        $power = 1;

        if ($number === 1) {
            return expect($this->value === 1)->toBeTrue();
        }

        while ($power < $this->value) {
            $power *= $number;
        }

        return expect($this->value === $power)->toBeTrue();
    }
}
