<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function (int $sum, int $from, int $to, callable $step): void {
    expect($sum)->toBeSummationOf($step, $from, $to);
})->with([
    [-2, -1, 0, fn (int $i): int => $i * 2],
    [0, 0, 0, fn (int $i): int => $i * 2],
    [110, 0, 10, fn (int $i): int => $i * 2],
    [110, 10, 0, fn (int $i): int => $i * 2],
    [418, 2, 20, function (int $i): int { return $i * 2; }],
]);

it('passes not', function (callable $step, int $from, int $to): void {
    expect(1)->not->toBeSummationOf($step, $from, $to);
})->with([
    [fn (int $i): int => $i * 2, 0, 10],
    [fn (int $i): int => $i * 2, 2, 20],
]);

it('fails if step does not return a number', function (): void {
    expect(0)->toBeSummationOf(fn (): string => 'not number', 0, 0);
})->throws(ExpectationFailedException::class);

test('failures', function (): void {
    expect(1)->toBeSummationOf(fn (int $i): int => $i * 2, 0, 1);
})->throws(ExpectationFailedException::class);

test('failures not', function (): void {
    expect(2)->not->toBeSummationOf(fn (int $i): int => $i * 2, 0, 1);
})->throws(ExpectationFailedException::class);
