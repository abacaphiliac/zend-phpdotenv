# zend-phpdotenv
ZF2 Module that loads [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv).

Module attaches a listener to EVENT_MERGE_CONFIG on ModuleManager's EventManager, before the ConfigListener merges the config.

# installation
```bash
composer require abacaphiliac/zend-phpdotenv
```

# usage
1. Add `Abacaphiliac\ZendPhpDotEnv` to your ZF2 application module config.
1. Create a `.env` file in the root directory of your ZF2 application.
1. Purge your ZF2 application's config cache (the environment variables will be added when the config is merged).

# dependencies
php >=5.3.9 and ZF >=2.3

See [composer.json](composer.json).

TODO Compatibility with ZF <2.3

# contributing
Don't break the build : P
```
vendor/bin/phing
```
