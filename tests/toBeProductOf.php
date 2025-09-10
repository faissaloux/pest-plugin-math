<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function (int $prod, int $from, int $to, callable $step): void {
    expect($prod)->toBeProductOf($step, $from, $to);
})->with([
    [0, -1, 0, fn (int $i): int => $i * 2],
    [0, 0, 0, fn (int $i): int => $i * 2],
    [3715891200, 1, 10, fn (int $i): int => $i * 2],
    [3715891200, 10, 1, fn (int $i): int => $i * 2],
    [362880, 2, 10, function (int $i): int {
        return $i - 1;
    }],
]);

it('passes not', function (callable $step, int $from, int $to): void {
    expect(1)->not->toBeProductOf($step, $from, $to);
})->with([
    [fn (int $i): int => $i * 2, 1, 10],
    [fn (int $i): int => $i * 2, 2, 20],
]);

it('fails if step does not return a number', function (): void {
    expect(0)->toBeProductOf(fn (): string => 'not number', 0, 0);
})->throws(ExpectationFailedException::class);

test('failures', function (): void {
    expect(1)->toBeProductOf(fn (int $i): int => $i * 2, 0, 1);
})->throws(ExpectationFailedException::class);

test('failures not', function (): void {
    expect(2)->not->toBeProductOf(fn (int $i): int => $i * 2, 1, 1);
})->throws(ExpectationFailedException::class);
