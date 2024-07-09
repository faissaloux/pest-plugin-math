<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function (int|float $first, int|float $second, ?int $precision = null): void {
    expect($first)->toBeSqrtOf($second, $precision);
})->with([
    [0, 0],
    [3, 9],
    [1.7888543819998, 3.2],
    [3.1622776601684, 10],
    [1.78885, 3.2, 5],
    [3.1623, 10, 4],
    [3.16, 10, 2],
    [3, 10, 0],
]);

it('passes not', function (int|float $first, int|float $second, ?int $precision = null): void {
    expect($first)->not->toBeSqrtOf($second, $precision);
})->with([
    [2, 9],
    [1, 3.2],
    [3, 10],
    [3, 10, 2],
    [3.162277, 10, 6],
]);

test('failures', function (): void {
    expect(3)->toBeSqrtOf(10);
})->throws(ExpectationFailedException::class);

test('failures on negative number', function (): void {
    expect(NAN)->toBeSqrtOf(-1);
})->throws(ExpectationFailedException::class);

test('failures not', function (): void {
    expect(3.162278)->not->toBeSqrtOf(10, 6);
})->throws(ExpectationFailedException::class);
