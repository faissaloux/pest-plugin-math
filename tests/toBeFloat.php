<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function ($number): void {
    expect($number)->toBeFloat();
})->with([10.0, 28.5, 3.14, -7.1, 0.99, 1e2, -28.5e-2, 10.022e23, -1.602e-19]);

it('passes not', function ($number): void {
    expect($number)->not->toBeFloat();
})->with([1, 2, 3, -7, 0]);

test('failures', function (): void {
    expect(7)->toBeFloat();
})->throws(ExpectationFailedException::class);

test('failures not', function (): void {
    expect(3.14)->not->toBeFloat();
})->throws(ExpectationFailedException::class);
