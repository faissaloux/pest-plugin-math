# PEST PLUGIN MATH

This plugin affords math related expectations.


[![Tests](https://github.com/faissaloux/pest-plugin-math/actions/workflows/tests.yml/badge.svg)](https://github.com/faissaloux/pest-plugin-math/actions/workflows/tests.yml) ![Codecov](https://img.shields.io/codecov/c/github/faissaloux/pest-plugin-math) ![Packagist Version](https://img.shields.io/packagist/v/faissaloux/pest-plugin-math) ![Packagist License](https://img.shields.io/packagist/l/faissaloux/pest-plugin-math)

## Requirements

| pest   | php     | pest-plugin-math |
| ------ | ------- | ---------------- |
| ^2.0   | ^8.1    | ^1.0.0           |
| ^3.0   | ^8.2    | ^1.3.0           |
| ^4.0   | ^8.3    | ^1.5.0           |

#### `toBeDivisibleBy()`
```php
    expect(8)->toBeDivisibleBy(4);
    expect(8)->not->toBeDivisibleBy(3);
```

#### `toBePowerOf()`
```php
    expect(4096)->toBePowerOf(8);
    expect(128)->not->toBePowerOf(3);
```

#### `toBeMaxOf()`
```php
    expect(6)->toBeMaxOf([-6, 0, 6]);
    expect(5.5)->not->toBeMaxOf([2, 4.2, 5.5, 6]);
```

#### `toBeMinOf()`
```php
    expect(-6)->toBeMinOf([-6, 0, 1]);
    expect(5.5)->not->toBeMinOf([2, 4.2, 5.5, 6]);
```

#### `toBeEven()`
```php
    expect(6)->toBeEven();
    expect(7)->not->toBeEven();
```

#### `toBeOdd()`
```php
    expect(7)->toBeOdd();
    expect(6)->not->toBeOdd();
```

#### `toBePrime()`
```php
    expect(3)->toBePrime();
    expect(6)->not->toBePrime();
```

#### `toBePositive()`
```php
    expect(1)->toBePositive();
    expect(-2)->not->toBePositive();
```

#### `toBeNegative()`
```php
    expect(-1)->toBeNegative();
    expect(2)->not->toBeNegative();
```

#### `toBeSqrtOf()`
```php
    expect(3)->toBeSqrtOf(9);
    expect(3.16)->toBeSqrtOf(10, 2);
    expect(2)->not->toBeSqrtOf(9);
```

#### `toBeFactorialOf()`
```php
    expect(6)->toBeFactorialOf(3);
    expect(4)->not->toBeFactorialOf(2);
```

#### `toBeAbsoluteOf()`
$$\mid -3 \mid$$
```php
    expect(3)->toBeAbsoluteOf(-3);
    expect(-3)->not->toBeAbsoluteOf(-3);
```

#### `toBeLogarithmOf()`
$$\log_{base}(number)$$
<br>
Base default is euler's number.
```php
    expect(0.69897000433602)->toBeLogarithmOf(number: 5, base: 10);
    expect(1)->not->toBeLogarithmOf(number: 1);
```

#### `toBeSumOf()`
```php
    expect(6)->toBeSumOf([1, 2, 3]);
    expect(4)->not->toBeSumOf([2, 3]);
```

#### `toBeSummationOf()`
$$\sum\limits_n^k x * 2$$
```php
    expect(2)->toBeSummationOf(fn (int $x) => $x * 2, from: 0, to: 1);
    expect(3)->not->toBeSummationOf(fn (int $x) => $x * 2, from: 0, to: 1);
```
