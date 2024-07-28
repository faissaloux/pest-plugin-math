# PEST PLUGIN MATH

This plugin affords math related expectations.


[![Tests](https://github.com/faissaloux/pest-plugin-math/actions/workflows/tests.yml/badge.svg)](https://github.com/faissaloux/pest-plugin-math/actions/workflows/tests.yml) ![Codecov](https://img.shields.io/codecov/c/github/faissaloux/pest-plugin-math) ![Packagist Version](https://img.shields.io/packagist/v/faissaloux/pest-plugin-math) ![Packagist License](https://img.shields.io/packagist/l/faissaloux/pest-plugin-math)


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

#### `toBeSumOf()`
$$\sum\limits_n^k x * 2$$
```php
    expect(2)->toBeSumOf(n: 0, k: 1, static fn (int $x) => $x * 2);
    expect(3)->not->toBeSumOf(n: 0, k: 1, static fn (int $x) => $x * 2);
```

#### `toBeProdOf()`
$$\prod\limits_n^k x * 2$$
```php
    expect(2)->toBeProdOf(n: 0, k: 1, static fn (int $x) => $x * 2);
    expect(3)->not->toBeProdOf(n: 0, k: 1, static fn (int $x) => $x * 2);
```

#### `toBeLogarithmOf()`
$$\log_{base}(number)$$
Base default is euler's number.
```php
    expect(0.69897000433602)->toBeLogarithmOf(number: 5, base: 10);
    expect(1)->not->toBeLogarithmOf(number: 1);
```
