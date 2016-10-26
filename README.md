# steemphp

[![Build Status](https://travis-ci.org/greymass/steemphp.svg?branch=master)](https://travis-ci.org/greymass/steemphp) [![Coverage Status](https://coveralls.io/repos/github/greymass/steemphp/badge.svg?branch=master)](https://coveralls.io/github/greymass/steemphp?branch=master)

## Install in your project

From within your project root, run:

```
composer require greymass/steemphp
```

or modify your `composer.json` to include:

```
{
  "name": "your/project",
  "minimum-stability": "dev",
  "require": {
    "greymass/steemphp": "dev-master"
  }
}
```

## Development


```
git clone https://github.com/greymass/steemphp.git
cd steemphp
composer install --dev
```


`phpunit` within the folder should execute all unit tests for this project. If you're on OSX using entr (`brew install entr`), you can run the following command for live testing as you develop:

```
find src/ tests/ | entr -c phpunit
```

## License

This project is licensed under the [MIT license](LICENSE).
