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
