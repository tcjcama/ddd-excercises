# Overview
This is a simple project to practice DDD and best practices.

## Environment requirements

1. Standalone

- php >=7.1
- [composer](https://getcomposer.org/download/)


2. ~~Docker~~ ⏳ Todo ⏳ 


## Setup

1. clone repo

```
clone repo https://github.com/tcjcama/ddd-exercises.git
```

2. install dependencies

```
composer install
```

3. copy the base phpunit config for custom testing

```
cp phpunit.xml.dist phpunit.xml 
```

4. **Enjoy** !! 🍫

## Depelopment 🛠

### Testing

Run tests

```
./vendor/bin/phpunit
```

Show Code coverage

```
./vendor/bin/phpunit --coverage-html ./coverage/videoclub
```