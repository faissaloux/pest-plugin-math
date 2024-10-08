<?php

use PHPUnit\Framework\ExpectationFailedException;

it('passes', function (int $number, int $min, int $max): void {
    expect($number)->toBeWithinNumbers($min, $max); 
})->with([
    [5, 1, 10],     
    [1, 1, 10],     
    [10, 1, 10], 
]);

it('passes not', function (int $number, int $min, int $max): void {
    expect($number)->not->toBeWithinNumbers($min, $max); 
})->with([
    [0, 1, 10],    
    [15, 1, 10],   
    [-1, 0, 10],   
]);

test('failures', function (): void {
    expect(15)->toBeWithinNumbers(1, 10); 
})->throws(ExpectationFailedException::class);

test('failures not', function (): void {
    expect(5)->not->toBeWithinNumbers(1, 10); 
})->throws(ExpectationFailedException::class);
