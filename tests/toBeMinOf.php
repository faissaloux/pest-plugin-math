<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function (int|float $value, array $stack): void {
    expect($value)->toBeMinOf($stack);
})->with([
    [-6, [-6, 0, 1]],
    [-6, [-6, -2, -1]],
    [2.4, [2.4, 4.2, 6]],
]);

it('passes not', function (int|float $value, array $stack): void {
    expect($value)->not->toBeMinOf($stack);
})->with([
    [4, [2, 4, 6]],
    [0, [2, 4]],
    [5.5, [2, 4.2, 5.5, 6]],
]);

test('failures', function (): void {
    expect(4)->toBeMinOf([2, 4, 6]);
})->throws(ExpectationFailedException::class);

test('failures not', function (): void {
    expect(2)->not->toBeMinOf([2, 4, 6]);
})->throws(ExpectationFailedException::class);
