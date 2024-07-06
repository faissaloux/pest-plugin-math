<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function (int $number): void {
    expect($number)->toBeEven();
})->with([2, 4, 6, 8, 10]);

it('passes not', function (int $number): void {
    expect($number)->not->toBeEven();
})->with([1, 3, 5, 7, 9]);

test('failures', function (): void {
    expect(7)->toBeEven();
})->throws(ExpectationFailedException::class);

test('failures not', function (): void {
    expect(6)->not->toBeEven();
})->throws(ExpectationFailedException::class);
