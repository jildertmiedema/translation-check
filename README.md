Laravel 4 translation checker
=================

Checks if all items are translated in all languages for laravel 4.

## Installation

Composer add

```json
	"require": {
		// ...

		"jildertmiedema/translation-check": "dev-master"
	},
```

Changes `app.config`

```php
	'providers' => array(
		// ...

		'JildertMiedema\TranslationCheck\TranslationCheckerServiceProvider',
	)
```

##Usage

```sh
php artisan translation:check
```

output:
```sh
en: has no validation.count
en: has no validation.countbetween
en: has no validation.countmax
en: has no validation.countmin
en: has no validation.match
```


