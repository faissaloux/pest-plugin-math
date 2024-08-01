<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function (int|float $value, float $number, float $base): void {
    expect($value)->toBeLogarithmOf($number, $base);
})->with([
    [1.6094379124341, 5, M_E],
    [2.302585092994, 10, M_E],
    [-3.5849625007212, 12, .5],
]);

it('passes not', function (float $number, float $base): void {
    expect(1)->not->toBeLogarithmOf($number, $base);
})->with([
    [5, M_E],
    [10, M_E],
    [12, .5],
]);

test('failures', function (float $number, float $base): void {
    expect(1)->toBeLogarithmOf($number, $base);
})->with([
    [1, M_E],
    [-1, M_E],
    [1, -M_E],
])->throws(ExpectationFailedException::class);

test('failures not', function (): void {
    expect(0)->not->toBeLogarithmOf(1);
})->throws(ExpectationFailedException::class);
