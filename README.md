# [Tournament Bet](https://github.com/thulin82/tournament_bet)

[![GitHub Actions](https://github.com/thulin82/tournament_bet/actions/workflows/github-actions.yml/badge.svg)](https://github.com/thulin82/tournament_bet/actions/workflows/github-actions.yml)

Based on [MVC Framework in PHP](https://github.com/thulin82/PHP-MVC-Framework)

## Requirements

- [PHP](http://php.net/) - The latest version of PHP is highly recommended
- [Composer](https://getcomposer.org/) - Dependency Manager

## Install

#### Dependencies

```bash
composer install
```

#### Run database migrations and seed with test data

```bash
vendor/bin/phinx rollback -e development -t 0
```

```bash
vendor/bin/phinx migrate -e development
```

```bash
vendor/bin/phinx seed:run -e development
```

## Docker

### Build

```bash
docker build -t tournament_bet_img .
```

### Run

```bash
docker run -d -p 4000:80 --name tournament_bet tournament_bet_img
```

© Markus Thulin 2016-
