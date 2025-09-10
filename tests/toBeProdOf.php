<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function (int $prod, array $numbers): void {
    expect($prod)->toBeProdOf($numbers);
})->with([
    [0, []],
    [0, [-1, 0, 1]],
    [36, [3, '3', 4]],
    [1024, [4, 4, 4, 4, 4]],
    [1680, [-4, -30, 14]],
    [15625, [5, 5, 5, 5, 5, 5]],
    [186624, [6, 6, 6, 6, 6, 6, 4]],
    [823543, [7, 7, 7, 7, 7, 7, 7, 1]],
    [134217728, [8, 8, 8, 8, 8, 8, 8, 8, 8]],
    [2711943423, [9, 9, 9, 9, 9, 9, 9, 9, 9, 7]],
    [100000000000, [10, 10, 10, 10, 10, 10, '10', 10, 10, 10, 10]],
]);

it('passes not', function (array $numbers): void {
    expect(1)->not->toBeProdOf($numbers);
})->with([
    [[2, 3]],
    [[1, 2, 3]],
    [[1, 2, 3, 4]],
    [[1, 2, 3, 4, 5]],
]);

it('fails if not number on the list', function (): void {
    expect(0)->toBeProdOf([2, 1, 3, 'not number', 78, 99]);
})->throws(ExpectationFailedException::class);

test('failures', function (): void {
    expect(1)->toBeProdOf([1, 2]);
})->throws(ExpectationFailedException::class);

test('failures not', function (): void {
    expect(2)->not->toBeProdOf([2]);
})->throws(ExpectationFailedException::class);
