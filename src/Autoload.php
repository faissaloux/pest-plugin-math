<?php

declare(strict_types=1);

namespace Faissaloux\PestMath;

use Pest\Mixins\Expectation;

expect()->extend('toBeDivisibleBy', function (int $divisor): Expectation {
    return expect($this->value % $divisor === 0)->toBeTrue();
});
