# devTYPO3v10DDEV

[![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://PayPal.me/SvenKalbhenn)
![GitHub](https://img.shields.io/github/license/Starraider/devTypo3ddev)
[![CodeFactor](https://www.codefactor.io/repository/github/starraider/devtypo3ddev/badge)](https://www.codefactor.io/repository/github/starraider/devtypo3ddev)
![GitHub issues](https://img.shields.io/github/issues/Starraider/devTypo3ddev)
![Lint Code Base](https://github.com/Starraider/devTypo3ddev/workflows/Lint%20Code%20Base/badge.svg)

This is my local developer enviroment.
My base sitepackage skom_sitepackage is preinstalled.

- [devTYPO3v10DDEV](#devtypo3v10ddev)
  - [Basic concept](#basic-concept)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
          - [f1: If you get an error msg on MacOS, saying your folder is not empty:  *rm .DS_Store*](#f1-if-you-get-an-error-msg-on-macos-saying-your-folder-is-not-empty-rm-ds_store)
    - [Setup](#setup)
      - [1. Detach from original repo](#1-detach-from-original-repo)
      - [2. Config the beta-server](#2-config-the-beta-server)
      - [3. Config the live-server](#3-config-the-live-server)
      - [4. Make your own Github repo](#4-make-your-own-github-repo)
  - [Start and Login](#start-and-login)
  - [Database](#database)
  - [Useful ddev commands](#useful-ddev-commands)
  - [TYPO3-Console](#typo3-console)
  - [Defined commands](#defined-commands)
    - [db-backup](#db-backup)
    - [db-restore](#db-restore)
    - [fileadmin-restore](#fileadmin-restore)
    - [warmup-dev](#warmup-dev)
    - [cron](#cron)
  - [Deployment](#deployment)
    - [First deployment](#first-deployment)
    - [Deployment to beta- or live-server](#deployment-to-beta--or-live-server)
  - [Testing](#testing)
    - [Linting](#linting)
      - [TypoScript Linter](#typoscript-linter)
      - [(S)CSS Linter](#scss-linter)
      - [eslint](#eslint)
      - [bootlint](#bootlint)
      - [PHP CodeSniffer](#php-codesniffer)
      - [php-cs-fixer](#php-cs-fixer)
      - [phpstan](#phpstan)
      - [parallel-lint](#parallel-lint)
      - [phpmd](#phpmd)
      - [phploc](#phploc)
      - [htmlhint](#htmlhint)

## Basic concept

The basic idea behind this project is to have an optimal development environment that I can use as a basis for all new customer projects.  All modern best practices for TYPO3 projects should be applied.
The development environment should also provide all the necessary linting and testing tools. Furthermore, automated deployment to a beta-server as well as to the live-server should be as easy as possible.

## Prerequisites

A latest version of [Docker](https://www.docker.com/) and [ddev-local](https://www.ddev.com/ddev-local/) must be available on the local system.

## Installation

    mkdir myNewProject
    cd myNewProject
    git clone https://github.com/Starraider/devTypo3ddev . [1](######f1)
    git submodule update --init --recursive

###### f1: If you get an error msg on MacOS, saying your folder is not empty:  *rm .DS_Store*

Change the project name in **.ddev/config.yaml** and **.env** (must be the same name in both files, use lowercase):

    mcedit .ddev/config.yaml 
      name=my-project
    mcedit .env
      PUBLIC_URL="https://my-project.ddev.site/"     
    ddev start
    ddev composer install
    ddev exec yarn install 
    ddev db-restore
    ddev fileadmin-restore

### Setup

Before start working with your freshly installed project, follow the next steps:

#### 1. Detach from original repo  

For your own project you should detach your lokal repo from the original Github repo:

    git remote rm origin

Later you will edit the styles and templates etc. in your own custom sitepackage. We already installed a custom sitepackage as a starting point for you in /packages/custom_sitepackage. You should detach the custom_sitepackage from its original repo as well:

    git rm --cached packages/customer_sitepackage   
    rm .gitmodules
    rm -rf packages/customer_sitepackage/.git
    rm -rf packages/customer_sitepackage/.github
    rm -rf .git/modules/packages/customer_sitepackage

#### 2. Config the beta-server

#### 3. Config the live-server

#### 4. Make your own Github repo

    hub create    
    git push -u origin HEAD 

## Start and Login

After [Setup](#setup) you should restart ddev:

    ddev restart

Now you can start the project in your webbrowser in 3 different ways:

    ddev open    // Opens TYPO3-Frontend

or

    ddev open -t    // Opens TYPO3-Backend

or just open https://my-project.ddev.site in your Webbrowser.

**TYPO3-Backend Login:**  
Username: dev-admin  
Passwort (same for the Intalltool): admin123

## Database

phpMyAdmin:
<http://ddev-typo3.ddev.site:8036/>

(Attention: don't use "https://" !)

## Useful ddev commands

Single command execution:

    ddev exec <command>

Interactive bash:

    ddev ssh

Here you can find more usefull [ddev commands](https://gist.github.com/Starraider/917e84487cb6f6286e7338beb0597504)

## TYPO3-Console

Use 'ddev typo3cms ...' to use the TYPO3-Console.

Here you can find more usefull [console commands](https://gist.github.com/Starraider/740b09f7fe6b87206e24c255d0e89a57)

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

For deployment we use [Deployer](https://deployer.org/).

### First deployment

Before the first deployment, you must enter your beta-server and live-server credentials in the deployer.php file.

First deployment will fail, because you have to edit the .env file, which is automatically generated during the first deployment at the shared folder.

On the beta-server edit the .env file to:

    TYPO3_CONTEXT="Development//Beta"
    INSTANCE="beta" 
    PUBLIC_URL="https://your.beta-server.tld/"
    And fill in the DB credentials of the beta-server.

On the live-server edit the .env file to:

    TYPO3_CONTEXT="Production"
    INSTANCE="live" 
    PUBLIC_URL="https://your.live-server.tld/"
    And fill in the DB credentials of the live-server.

### Deployment to beta- or live-server

    php vendor/bin/dep deploy -vv beta
    php vendor/bin/dep deploy -vv live

If something went wrong, you have to unlock the deployment:

    php vendor/bin/dep deploy:unlock -vv beta 
    php vendor/bin/dep deploy:unlock -vv live

## Testing

### Linting

#### TypoScript Linter

Linter for TypoScript.
[[more >>]](https://github.com/martin-helmich/typo3-typoscript-lint)

    typoscript-lint path/to/your.typoscript

Example:

    typoscript-lint packages/customer_sitepackage/Configuration/TypoScript/setup.typoscript

#### (S)CSS Linter

Linter for CSS, SCSS, SASS, and LESS files.
[[more >>]](https://stylelint.io/)

    npx stylelint --config ./.stylelintrc.json "path/to/dir/**/*.scss"

Example:

    npx stylelint --config ./.stylelintrc.json "packages/customer_sitepackage/**/*.{css,scss}" 

#### eslint

Linter for JavaScript, yaml and markdown files, which can also automatically correct coding standard violations.
[[more >>]](https://eslint.org/)

    npx eslint "path/to/dir/**/*.js"
    npx eslint --fix "path/to/dir/**/*.js"
    npx eslint "path/to/file/file.yaml"
    npx eslint . --ext .yml
    npx eslint file.md

Example:

    npx eslint "packages/customer_sitepackage/**/*.js"
    npx eslint "packages/customer_sitepackage/**/*.{yaml,yml}"
    npx eslint README.md

#### bootlint

Bootlint is a HTML linter for bootstrap projects.
[[more >>]](https://github.com/twbs/bootlint)

    npx bootlint "path/to/dir/**/*.html"

Example:

    npx bootlint "packages/customer_sitepackage/**/*.html" 

#### PHP CodeSniffer

PHP CodeSniffer is a linter, which can also automatically correct coding standard violations.

Configuration file: phpcs.ruleset.xml
[[more >>]](https://github.com/squizlabs/PHP_CodeSniffer)

    vendor/bin/phpcs path/to/dir
    vendor/bin/phpcs path/to/file

Examples:

    vendor/bin/phpcs packages/customer_sitepackage

Use phpcbf to automatically fix as many errors as possible.

    vendor/bin/phpcbf path/to/dir -vv
    vendor/bin/phpcbf path/to/file -vvv

#### php-cs-fixer

PHP code standard fixer.
[[more >>]](https://github.com/FriendsOfPHP/PHP-CS-Fixer)

To fix your php files automaticly:

    vendor/bin/php-cs-fixer fix path/to/dir
    vendor/bin/php-cs-fixer fix path/to/file

If you use the dir syntax all subdirs will be checked as well!

To make a dry run:

    vendor/bin/php-cs-fixer fix --dry-run path/to/file

To show details use the parameter -v -vv or -vvv

Examples:

    vendor/bin/php-cs-fixer fix packages/customer_sitepackage -v
    vendor/bin/php-cs-fixer fix public/typo3conf/ext/skom_sitepackage --dry-run -vvv

#### phpstan

PHP linter.
[[more >>]](https://github.com/phpstan/phpstan)

    vendor/bin/phpstan analyse --level 0..8 path/to/dir

Example:

    vendor/bin/phpstan analyse -l 5 public/typo3conf/ext/skom_sitepackage

#### parallel-lint

Very fast php linter.
[[more >>]](https://github.com/php-parallel-lint/PHP-Parallel-Lint)

    vendor/bin/parallel-lint path/to/dir
    vendor/bin/parallel-lint path/to/file

Example:

    vendor/bin/parallel-lint public/typo3conf/ext/skom_sitepackage

#### phpmd

PHP linter checking for possible bugs, suboptimal code, overcomplicated expressions and unused code.
[[more >>]](https://github.com/phpmd/phpmd)

    vendor/bin/phpmd path/to/dir format ruleset

format can be: xml, text, ansi (best for terminal output), html, json.

rulesets are: codesize,unusedcode,naming,cleancode,controversial,design

Example:

    vendor/bin/phpmd public/typo3conf/ext/skom_sitepackage ansi codesize,unusedcode,naming

#### phploc

To get some statistics about your PHP project, you could use phploc
[[more >>]](https://github.com/sebastianbergmann/phploc)

    vendor/bin/phploc path/to/dir

Example:

    vendor/bin/phploc packages/customer_sitepackage
    vendor/bin/phploc public/typo3conf/ext/skom_sitepackage

#### htmlhint

Linter for HTML files or websites. Be aware this linter doesn't work with fluid templates!
But it can check websites! [[more >>]](https://htmlhint.com/)

    npx htmlhint path/to/dir 
    npx htmlhint https://www.mywebsite.de 

---

Developed 2020 by Sven Kalbhenn

If you have any questions about this project or just want to talk:
Send me a message [sven@skom.de](mailto:sven@skom.de)
