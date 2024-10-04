<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function (int $sum, int $from, int $to, callable $step): void {
    expect($sum)->toBeSummationOf($step, $from, $to);
})->with([
    [110, 0, 10, static fn (int $i): int => $i * 2],
    [418, 2, 20, static fn (int $i): int => $i * 2],
    [1628, 4, 40, static fn (int $i): int => $i * 2],
    [3630, 6, 60, static fn (int $i): int => $i * 2],
    [6424, 8, 80, static fn (int $i): int => $i * 2],
]);

it('passes not', function (callable $step, int $from, int $to): void {
    expect(1)->not->toBeSummationOf($step, $from, $to);
})->with([
    [static fn (int $i): int => $i * 2, 0, 10],
    [static fn (int $i): int => $i * 2, 2, 20],
    [static fn (int $i): int => $i * 2, 4, 40],
    [static fn (int $i): int => $i * 2, 6, 60],
    [static fn (int $i): int => $i * 2, 8, 80],
]);

test('failures', function (): void {
    expect(1)->toBeSummationOf(static fn (int $i): int => $i * 2, 0, 1);
})->throws(ExpectationFailedException::class);

test('failures not', function (): void {
    expect(2)->not->toBeSummationOf(static fn (int $i): int => $i * 2, 0, 1);
})->throws(ExpectationFailedException::class);
