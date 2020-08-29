<?php
namespace Deployer;

require_once(__DIR__ . '/vendor/sourcebroker/deployer-loader/autoload.php');
new \SourceBroker\DeployerExtendedTypo3\Loader();

set('repository', 'https://github.com/Starraider/devTypo3ddev.git');
set('web_path', 'public/');
set('git_tty', true);

host('live')
    ->hostname('p203341.typo3server.info')
    ->user('p203341')
    ->configFile('~/.ssh/config')
    ->identityFile('~/.ssh/id_rsa')
    ->port(22)
    ->set('branch', 'master')
    ->set('writable_mode', 'chmod')
    ->forwardAgent(true)
    ->set('bin/php', 'php')
    ->set('bin/composer', 'php /files/swm2/composer/composer.phar')
    ->set('public_urls', ['https://live.skom-support.de'])
    ->set('deploy_path', '/home/www/p203341/html/devTypo3ddev/live');

host('beta')
    ->hostname('p203341.typo3server.info')
    ->user('p203341')
    ->configFile('~/.ssh/config')
    ->identityFile('~/.ssh/id_rsa')
    ->port(22)
    ->set('branch', 'master')
    ->set('writable_mode', 'chmod')
    ->forwardAgent(true)
    ->set('bin/php', 'php')
    ->set('bin/composer', 'php /files/swm2/composer/composer.phar')
    ->set('public_urls', ['https://beta.skom-support.de'])
    ->set('deploy_path', '/home/www/p203341/html/devTypo3ddev/beta');

host('local')
    ->hostname('local')
    ->set('deploy_path', getcwd())
    ->set('vhost_nocurrent', true)
    ->set('bin/php', 'php')
    ->set('bin/composer', 'php /usr/local/bin/composer')
    ->set('public_urls', ['https://ddev-typo3.ddev.site']);

//********************************* */
    
// Tasks
task('pwd', function () {
    $result = run('pwd');
    writeln("Current dir: $result");
});
