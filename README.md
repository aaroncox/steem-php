# steemphp


## Install

php composer.phar install --dev

## Development

`phpunit` within the folder should execute all unit tests for this project. If you're on OSX using entr (`brew install entr`), you can run the following command for live testing as you develop:

```
find src/ tests/ | entr -c phpunit
```

## License

This project is licensed under the [MIT license](LICENSE).
