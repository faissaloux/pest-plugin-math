<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function (int $number): void {
    expect($number)->toBePrime();
})->with([2, 3, 5, 7, 11]);

it('passes not', function (int $number): void {
    expect($number)->not->toBePrime();
})->with([1, 4, 6, 8, 9]);

test('failures', function (): void {
    expect(4)->toBePrime();
})->throws(ExpectationFailedException::class);

test('failures not', function (): void {
    expect(3)->not->toBePrime();
})->throws(ExpectationFailedException::class);
