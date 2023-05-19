# [Tournament Bet](https://github.com/thulin82/tournament_bet)

[![GitHub Actions](https://github.com/thulin82/tournament_bet/actions/workflows/github-actions.yml/badge.svg)](https://github.com/thulin82/tournament_bet/actions/workflows/github-actions.yml)

## Requirements

-   [PHP](http://php.net/) - The latest version of PHP is highly recommended
-   [Composer](https://getcomposer.org/) - Dependency Manager

## Install

#### Dependencies

```
$ make composer-install
```

#### Run database migrations and seed with test data

```
$ make database
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
