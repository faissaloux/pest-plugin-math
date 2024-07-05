# PEST PLUGIN MATH

This plugin afford math related expectations.

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
