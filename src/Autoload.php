<?php

declare(strict_types=1);

namespace Faissaloux\PestMath;

expect()->extend('toBeDivisibleBy', function (int $divisor) {
    return expect($this->value % $divisor === 0)->toBeTrue();
});
