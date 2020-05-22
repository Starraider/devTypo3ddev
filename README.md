# devTYPO3v10DDEV

[![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://PayPal.me/SvenKalbhenn)
![GitHub](https://img.shields.io/github/license/Starraider/devTypo3ddev)
[![CodeFactor](https://www.codefactor.io/repository/github/starraider/devtypo3ddev/badge)](https://www.codefactor.io/repository/github/starraider/devtypo3ddev)
![GitHub issues](https://img.shields.io/github/issues/Starraider/devTypo3ddev)

This is my local developer enviroment.
My base sitepackage skom_sitepackage is preinstalled.

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

## Datenbank

phpMyAdmin:
<http://ddev-typo3.ddev.site:8036/>

(Attention: don't use "https://" !)

## Defined commands

## db-restore

Run 'ddev db-restore' for restoring the DB

## fileadmin-restore

Run 'ddev fileadmin-restore' to restore the files in fileadmin.

## warmup-dev

If you run 'ddev warmup-dev' every page from the sitemap will be fetched by wget to warm up the caches. 

### cron

Run 'ddev t3cron' if you need the Scheduler.

---

Developed 2020 by Sven Kalbhenn

If you have any questions about this project or just want to talk:
Send me a message [sven@skom.de](mailto:sven@skom.de)
