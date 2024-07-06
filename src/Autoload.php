<?php

declare(strict_types=1);

use Faissaloux\PestMath\Expectation;
use Pest\Expectation as PestExpectation;

$expectations = get_class_methods(Expectation::class);

foreach ($expectations as $expectation) {
    expect()->extend(
        $expectation,
        function () use ($expectation): PestExpectation {
            if (is_callable($callback = [new Expectation($this->value), $expectation])) {
                call_user_func($callback, ...func_get_args());
            }

            return $this;
        }
    );
}
