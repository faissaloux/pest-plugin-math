<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function (int $sum, int $n, int $k, callable $step): void {
    expect($sum)->toBeSumOf($n, $k, $step);
})->with([
    [110, 0, 10, static fn (int $i) => $i * 2],
    [418, 2, 20, static fn (int $i) => $i * 2],
    [1628, 4, 40, static fn (int $i) => $i * 2],
    [3630, 6, 60, static fn (int $i) => $i * 2],
    [6424, 8, 80, static fn (int $i) => $i * 2],
]);

it('passes not', function (int $n, int $k, callable $step): void {
    expect(1)->not->toBeSumOf($n, $k, $step);
})->with([
    [0, 10, static fn (int $i) => $i * 2],
    [2, 20, static fn (int $i) => $i * 2],
    [4, 40, static fn (int $i) => $i * 2],
    [6, 60, static fn (int $i) => $i * 2],
    [8, 80, static fn (int $i) => $i * 2],
]);

test('failures', function (): void {
    expect(1)->toBeSumOf(0, 1, static fn (int $i) => $i * 2);
})->throws(ExpectationFailedException::class);

test('failures not', function (): void {
    expect(2)->not->toBeSumOf(0, 1, static fn (int $i) => $i * 2);
})->throws(ExpectationFailedException::class);
