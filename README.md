# devTYPO3v10DDEV

[![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://PayPal.me/SvenKalbhenn)
![GitHub](https://img.shields.io/github/license/Starraider/devTypo3ddev)
[![CodeFactor](https://www.codefactor.io/repository/github/starraider/devtypo3ddev/badge)](https://www.codefactor.io/repository/github/starraider/devtypo3ddev)
![GitHub issues](https://img.shields.io/github/issues/Starraider/devTypo3ddev)
![Lint Code Base](https://github.com/Starraider/devTypo3ddev/workflows/Lint%20Code%20Base/badge.svg)
![CodeQL](https://github.com/Starraider/devTypo3ddev/workflows/CodeQL/badge.svg)


This is my local developer enviroment.
My base sitepackage skom_sitepackage is preinstalled.

- [devTYPO3v10DDEV](#devtypo3v10ddev)
  - [Installation](#installation)
  - [Login](#login)
  - [Database](#database)
  - [TYPO3-Console](#typo3-console)
    - [Flush all caches](#flush-all-caches)
  - [Defined commands](#defined-commands)
    - [db-backup](#db-backup)
    - [db-restore](#db-restore)
    - [fileadmin-restore](#fileadmin-restore)
    - [warmup-dev](#warmup-dev)
    - [cron](#cron)
  - [Deployment](#deployment)
  - [Testing](#testing)
    - [Linting](#linting)
      - [TypoScript Linter](#typoscript-linter)

## Installation

    ddev start
    ddev composer install
    ddev db-restore
    ddev fileadmin-restore

    ddev open 

or

    ddev open -t

or

<https://ddev-typo3.ddev.site>

## Login

TYPO3 Login
dev-admin : dev-admin
Intalltool: admin123

## Database

phpMyAdmin:
<http://ddev-typo3.ddev.site:8036/>

(Attention: don't use "https://" !)

## TYPO3-Console

Use 'ddev typo3cms ...' to use the TYPO3-Console.

### Flush all caches

    ddev typo3cms cache:flush

## Defined commands

### db-backup

Run 'ddev db-backup' to generate a backup of the DB.

### db-restore

Run 'ddev db-restore' for restoring the DB.

### fileadmin-restore

Run 'ddev fileadmin-restore' to restore the files in fileadmin.

### warmup-dev

If you run 'ddev warmup-dev' every page from the sitemap will be fetched by wget to warm up the caches. 

### cron

Run 'ddev t3cron' if you need the Scheduler.

## Deployment

    php vendor/bin/dep deploy -vv beta

    php vendor/bin/dep unlock -vv beta 

## Testing

### Linting

#### TypoScript Linter

    typoscript-lint path/to/your.typoscript
f.e.:
    typoscript-lint packages/customer_sitepackage/Configuration/TypoScript/setup.typoscript

---

Developed 2020 by Sven Kalbhenn

If you have any questions about this project or just want to talk:
Send me a message [sven@skom.de](mailto:sven@skom.de)
