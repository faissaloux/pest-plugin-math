<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function (int $sum, int $n, int $k, callable $step): void {
    expect($sum)->toBeProdOf($n, $k, $step);
})->with([
    [3715891200, 1, 10, static fn (int $i) => $i * 2],
    [5760, 3, 6, static fn (int $i) => $i * 2],
    [17472, 12, 14, static fn (int $i) => $i * 2],
    [6027840, 90, 92, static fn (int $i) => $i * 2],
    [2306942668800, 55, 60, static fn (int $i) => $i * 2],
]);

it('passes not', function (int $n, int $k, callable $step): void {
    expect(1)->not->toBeProdOf($n, $k, $step);
})->with([
    [1, 10, static fn (int $i) => $i * 2],
    [3, 6, static fn (int $i) => $i * 2],
    [12, 14, static fn (int $i) => $i * 2],
    [90, 92, static fn (int $i) => $i * 2],
    [55, 60, static fn (int $i) => $i * 2],
]);

test('failures', function (): void {
    expect(1)->toBeProdOf(0, 1, static fn (int $i) => $i * 2);
})->throws(ExpectationFailedException::class);

test('failures not', function (): void {
    expect(2)->not->toBeProdOf(1, 1, static fn (int $i) => $i * 2);
})->throws(ExpectationFailedException::class);
