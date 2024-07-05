<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function (int $dividend, int $divisor): void {
    expect($dividend)->toBeDivisibleBy($divisor);
})->with([
    'even' => [8, 4],
    'odd' => [6, 3],
]);

test('failures', function (): void {
    expect(8)->toBeDivisibleBy(3);
})->throws(ExpectationFailedException::class);
