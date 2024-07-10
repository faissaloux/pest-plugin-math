<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function (int $first, int $second): void {
    expect($first)->toBeFactorialOf($second);
})->with([
    [1, 0],
    [1, 1],
    [2, 2],
    [6, 3],
    [40320, 8],
]);

it('passes not', function (): void {
    expect(4)->not->toBeFactorialOf(2);
});

test('failures', function (): void {
    expect(720)->toBeFactorialOf(7);
})->throws(ExpectationFailedException::class);

test('failures not', function (): void {
    expect(5040)->not->toBeFactorialOf(7);
})->throws(ExpectationFailedException::class);
