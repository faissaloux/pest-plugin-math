<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function (int $number): void {
    expect($number)->toBeNegative();
})->with([-1, -2, -3, -4, -5, -6]);

it('passes not', function (int $number): void {
    expect($number)->not->toBeNegative();
})->with([1, 2, 3, 4, 5, 6]);

test('failures', function (): void {
    expect(0)->toBeNegative();
})->throws(ExpectationFailedException::class);

test('failures not', function (): void {
    expect(-2)->not->toBeNegative();
})->throws(ExpectationFailedException::class);
