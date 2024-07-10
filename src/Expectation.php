<?php

declare(strict_types=1);

namespace Faissaloux\PestMath;

use Pest\Expectation as PestExpectation;

/**
 * @internal
 *
 * @template TValue
 */
final class Expectation
{
    public function __construct(private int|float $value) {}

    /**
     * @return PestExpectation<TValue>
     */
    public function toBeDivisibleBy(int $divisor): PestExpectation
    {
        return expect($this->value % $divisor === 0)->toBeTrue();
    }

    /**
     * @return PestExpectation<TValue>
     */
    public function toBeEven(): PestExpectation
    {
        return expect($this->value % 2 === 0)->toBeTrue();
    }

    /**
     * @return PestExpectation<TValue>
     */
    public function toBeOdd(): PestExpectation
    {
        return expect($this->value % 2 !== 0)->toBeTrue();
    }

    /**
     * @return PestExpectation<TValue>
     */
    public function toBePositive(): PestExpectation
    {
        return expect($this->value > 0)->toBeTrue();
    }

    /**
     * @return PestExpectation<TValue>
     */
    public function toBeNegative(): PestExpectation
    {
        return expect($this->value < 0)->toBeTrue();
    }

    /**
     * @return PestExpectation<TValue>
     */
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

    /**
     * @return PestExpectation<TValue>
     */
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

    /**
     * @return PestExpectation<TValue>
     */
    public function toBeSqrtOf(int|float $number, ?int $precision = null): PestExpectation
    {
        expect($number >= 0)->toBeTrue();

        $sqrt = sqrt($number);

        if ($precision !== null) {
            $sqrt = number_format($sqrt, $precision);
        }

        return expect((string) $this->value === (string) $sqrt)->toBeTrue();
    }

    /**
     * @return PestExpectation<TValue>
     */
    public function toBeBetween(int $from, int $to)
    {
        return expect($this->value)->toBeGreaterThanOrEqualTo($from)
            ->and($this->value)->toBeLessThanOrEqualTo($to);
    }
}
