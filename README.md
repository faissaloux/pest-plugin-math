# PEST PLUGIN MATH

This plugin afford math related expectations.

#### `toBeDivisibleBy()`
```php
    expect(8)->toBeDivisibleBy(4); // true
    expect(8)->toBeDivisibleBy(3); // false
```

#### `toBePowerOf()`
```php
    expect(4096)->toBePowerOf(8); // true
    expect(128)->toBePowerOf(3); // false
```
