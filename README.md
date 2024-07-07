# PEST PLUGIN MATH

This plugin afford math related expectations.


[![Tests](https://github.com/faissaloux/pest-plugin-math/actions/workflows/tests.yml/badge.svg)](https://github.com/faissaloux/pest-plugin-math/actions/workflows/tests.yml) ![Packagist Version](https://img.shields.io/packagist/v/faissaloux/pest-plugin-math) ![Packagist License](https://img.shields.io/packagist/l/faissaloux/pest-plugin-math)


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
