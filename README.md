[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/abacaphiliac/zend-phpdotenv/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/abacaphiliac/zend-phpdotenv/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/abacaphiliac/zend-phpdotenv/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/abacaphiliac/zend-phpdotenv/?branch=master)
[![Build Status](https://travis-ci.org/abacaphiliac/zend-phpdotenv.svg?branch=master)](https://travis-ci.org/abacaphiliac/zend-phpdotenv)

# zend-phpdotenv
ZF2 Module that loads [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv).

Module attaches a listener to `EVENT_LOAD_MODULE` on ModuleManager's EventManager to load environment variables while the module is loaded.

# Installation
```bash
composer require abacaphiliac/zend-phpdotenv
```

# Usage
1. Add `Abacaphiliac\ZendPhpDotEnv` to your ZF2 application module config.
2. Create a `.env` file in the root directory of your ZF2 application.
3. Use `getenv()` anywhere in your code (or config) to pull environment variables.

# Dependencies
php >=5.3.9 and ZF >=2.3

See [composer.json](composer.json).

TODO Compatibility with ZF <2.3

## Contributing
```
composer install && vendor/bin/phing
```

This library attempts to comply with [PSR-1][], [PSR-2][], and [PSR-4][]. If
you notice compliance oversights, please send a patch via pull request.

[PSR-1]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md
[PSR-2]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md
[PSR-4]: https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md
