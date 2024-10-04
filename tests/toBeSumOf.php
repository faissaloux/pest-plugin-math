<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function (int $sum, array $numbers): void {
    expect($sum)->toBeSumOf($numbers);
})->with([
    [10, [3, 3, 4]],
    [20, [4, 4, 4, 4, 4]],
    [30, [5, 5, 5, 5, 5, 5]],
    [40, [6, 6, 6, 6, 6, 6, 4]],
    [50, [7, 7, 7, 7, 7, 7, 7, 1]],
    [72, [8, 8, 8, 8, 8, 8, 8, 8, 8]],
    [88, [9, 9, 9, 9, 9, 9, 9, 9, 9, 7]],
    [110, [10, 10, 10, 10, 10, 10, 10, 10, 10, 10, 10]],
]);

it('passes not', function (array $numbers): void {
    expect(1)->not->toBeSumOf($numbers);
})->with([
    [[2, 3]],
    [[1, 2, 3]],
    [[1, 2, 3, 4]],
    [[1, 2, 3, 4, 5]],
]);

test('failures', function (): void {
    expect(1)->toBeSumOf([]);
})->throws(ExpectationFailedException::class);

test('failures not', function (): void {
    expect(2)->not->toBeSumOf([2]);
})->throws(ExpectationFailedException::class);
