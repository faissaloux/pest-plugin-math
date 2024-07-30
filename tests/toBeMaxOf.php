<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function (int|float $value, array $stack): void {
    expect($value)->toBeMaxOf($stack);
})->with([
    [1, [-6, 0, 1]],
    [6, [-6, 0, 6]],
    [5.5, [2, 4.2, 5.5]],
]);

it('passes not', function (int|float $value, array $stack): void {
    expect($value)->not->toBeMaxOf($stack);
})->with([
    [4, [2, 4, 6]],
    [6, [2, 4]],
    [5.5, [2, 4.2, 5.5, 6]],
]);

test('failures', function (): void {
    expect(4)->toBeMaxOf([2, 4, 6]);
})->throws(ExpectationFailedException::class);

test('failures not', function (): void {
    expect(6)->not->toBeMaxOf([2, 4, 6]);
})->throws(ExpectationFailedException::class);
