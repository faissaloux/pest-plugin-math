<?php

use Faissaloux\PestMath\Expectation;
use Pest\Expectation as PestExpectation;

$expectations = get_class_methods(Expectation::class);

foreach ($expectations as $expectation) {
    expect()->extend(
        $expectation,
        function () use ($expectation): PestExpectation {
            return call_user_func([new Expectation($this->value), $expectation], ...func_get_args());
        }
    );
}
