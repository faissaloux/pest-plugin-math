<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function (int $number): void {
    expect($number)->toBePositive();
})->with([1, 2, 3, 4, 5, 6]);

it('passes not', function (int $number): void {
    expect($number)->not->toBePositive();
})->with([-1, -2, -3, -4, -5, -6]);

test('failures', function (): void {
    expect(0)->toBePositive();
})->throws(ExpectationFailedException::class);

test('failures not', function (): void {
    expect(6)->not->toBePositive();
})->throws(ExpectationFailedException::class);
