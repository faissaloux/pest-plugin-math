<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function (int|float $number): void {
    expect($number)->toBeAbsoluteOf($number)
        ->and($number)->toBeAbsoluteOf(-$number);
})->with([1, 3, 5, 7, 9, 4.6, 7.8]);

it('passes not', function (int|float $number): void {
    expect($number + 1)->not->toBeAbsoluteOf($number)
        ->and($number + 1)->not->toBeAbsoluteOf(-$number);
})->with([1, 3, 5, 7, 9, 4.6, 7.8]);

test('failures', function (): void {
    expect(-8)->toBeAbsoluteOf(8);
})->throws(ExpectationFailedException::class);

test('failures not', function (): void {
    expect(8)->not->toBeAbsoluteOf(8);
})->throws(ExpectationFailedException::class);
