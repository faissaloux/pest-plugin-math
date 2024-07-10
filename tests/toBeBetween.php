<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function (int $number, int $min, int $max): void {
    expect($number)->toBeBetween($min, $max);
})->with([
    'in range' => [5, 1, 10],
    'on lower boundary' => [1, 1, 10],
    'on upper boundary' => [10, 1, 10],
]);

it('passes not', function (): void {
    expect(11)->not->toBeBetween(1, 10);
});

test('failures', function (): void {
    expect(6)->toBeBetween(1, 5);
})->throws(ExpectationFailedException::class);

test('failures not', function (): void {
    expect(8)->not->toBeBetween(1, 10);
})->throws(ExpectationFailedException::class);
