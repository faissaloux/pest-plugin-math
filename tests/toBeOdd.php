<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function (int $number): void {
    expect($number)->toBeOdd();
})->with([1, 3, 5, 7, 9]);

it('passes not', function (int $number): void {
    expect($number)->not->toBeOdd();
})->with([2, 4, 6, 8, 10]);

test('failures', function (): void {
    expect(6)->toBeOdd();
})->throws(ExpectationFailedException::class);

test('failures not', function (): void {
    expect(7)->not->toBeOdd();
})->throws(ExpectationFailedException::class);
