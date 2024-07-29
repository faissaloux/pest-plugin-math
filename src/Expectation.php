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
            if ($this->value % $i === 0) {
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
    public function toBeFactorialOf(int $number): PestExpectation
    {
        expect($this->value)->tobeInt()
            ->and($number >= 0)->toBeTrue();

        if ($number === 0 || $number === 1) {
            return expect($this->value === 1)->toBeTrue();
        }

        $factorial = 1;

        for ($i = $number; $i > 1; $i--) {
            $factorial *= $i;
        }

        return expect($this->value === $factorial)->toBeTrue();
    }

    /**
     * @return PestExpectation<TValue>
     */
    public function toBeLogarithmOf(float $number, float $base = M_E): PestExpectation
    {
        return expect($base > 0)->toBeTrue('The base must be greater than 0')
            ->and($number > 0)->toBeTrue('The number must be greater than 0')
            ->and((string) $this->value === (string) log($number, $base))->toBeTrue("$this->value doesn't equal log($number, $base)");
    }

    /**
     * @return PestExpectation<TValue>
     */
    public function toBeAbsoluteOf(int|float $number): PestExpectation
    {
        return expect($this->value === abs($number))->toBeTrue("$this->value doesn't equal abs($number)");
    }

    /**
     * @param  array<int|float>  $stack
     * @return PestExpectation<TValue>
     */
    public function toBeMaxOf(array $stack): PestExpectation
    {
        return expect($this->value === max($stack))->toBeTrue();
    }

    /**
     * @param  array<int|float>  $stack
     * @return PestExpectation<TValue>
     */
    public function toBeMinOf(array $stack): PestExpectation
    {
        return expect($this->value === min($stack))->toBeTrue();
    }

    /**
     * @return PestExpectation<TValue>
     */
    public function toBeSumOf(int $n, int $k, callable $step): PestExpectation
    {
        $sum = 0;

        foreach (range($n, $k) as $i) {
            $stepSum = $step($i);
            expect($stepSum)->toBeNumeric();
            $sum += $stepSum;
        }

        return expect($this->value === $sum)->toBeTrue("$this->value !== $sum");
    }

    /**
     * @return PestExpectation<TValue>
     */
    public function toBeProdOf(int $n, int $k, callable $step): PestExpectation
    {
        $sum = 1;

        foreach (range($n, $k) as $i) {
            $stepSum = $step($i);
            expect($stepSum)->toBeNumeric();
            $sum *= $stepSum;
        }

        return expect($this->value === $sum)->toBeTrue("$this->value !== $sum");
    }

    /**
     * @return PestExpectation<TValue>
     */
    public function toBeLogarithmOf(float $number, float $base = M_E): PestExpectation
    {
        return expect($base > 0)->toBeTrue('The base must be greater than 0')
            ->and($number > 0)->toBeTrue('The number must be greater than 0')
            ->and((string) $this->value === (string) log($number, $base))->toBeTrue("$this->value !== log($number, $base) === ".log($number, $base));
    }

    /**
     * @return PestExpectation<TValue>
     */
    public function toBeAbsoluteOf(int|float $number): PestExpectation
    {
        return expect($this->value === abs($number))->toBeTrue("$this->value !== abs($number)");
    }
}
