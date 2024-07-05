<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function (int $first, int $second): void {
    expect($first)->toBePowerOf($second);
})->with([
    [1, 1],
    [128, 2],
    [100, 10],
    [4096, 8],
]);

it('passes not', function (): void {
    expect(128)->not->toBePowerOf(3);
});

test('failures', function (): void {
    expect(128)->toBePowerOf(3);
})->throws(ExpectationFailedException::class);

test('failures not', function (): void {
    expect(128)->not->toBePowerOf(2);
})->throws(ExpectationFailedException::class);
