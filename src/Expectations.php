<?php

declare(strict_types=1);

namespace Faissaloux\PestMath;

use Pest\Expectation;

expect()->extend('toBeDivisibleBy', function (int $divisor): Expectation {
    return expect($this->value % $divisor === 0)->toBeTrue();
});

expect()->extend('toBeEven', function (): Expectation {
    return expect($this->value % 2 === 0)->toBeTrue();
});

expect()->extend('toBeOdd', function (): Expectation {
    return expect($this->value % 2 !== 0)->toBeTrue();
});

expect()->extend('toBePrime', function (): Expectation {
    if ($this->value === 1) {
        return expect(true)->toBe(false);
    }

    for ($i = 2; $i < $this->value; $i++) {
        if ($this->value % $i == 0) {
            return expect(true)->toBe(false);
        }
    }

    return expect(true)->toBeTrue();
});

expect()->extend('toBePowerOf', function (int $number): Expectation {
    $power = 1;

    if ($number === 1) {
        return expect($this->value === 1)->toBeTrue();
    }

    while ($power < $this->value) {
        $power *= $number;
    }

    return expect($this->value === $power)->toBeTrue();
});
