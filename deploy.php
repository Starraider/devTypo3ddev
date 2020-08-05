<?php
namespace Deployer;

require_once(__DIR__ . '/vendor/sourcebroker/deployer-loader/autoload.php');
new \SourceBroker\DeployerExtendedTypo3\Loader();

set('repository', 'https://github.com/Starraider/devTypo3ddev.git');
set('bin/php', '/usr/local/bin/php');
set('web_path', 'public/');


host('beta')
    ->hostname('p203341.typo3server.info')
    ->user('p203341')
    ->configFile('~/.ssh/config')
    ->identityFile('~/.ssh/id_rsa')
    ->port(22)
    ->set('branch', 'master')
    ->set('writable_mode', 'chmod')
    ->set('public_urls', ['https://beta.skom-support.de'])
    ->set('deploy_path', '~/html/devTypo3ddev/beta/');

//********************************* */
// Project name
//set('application', 'devTypo3ddev');
//set('typo3_webroot', 'public');
//set('http_user', 'p203341');


// Hosts
//inventory('./config/deployer/hosts.yaml');
/*
host('beta')
    ->hostname('p203341.typo3server.info')
    ->stage('beta')
    ->user('p203341')
    ->configFile('~/.ssh/config')
    ->identityFile('~/.ssh/id_rsa')
    ->port(22)
    ->forwardAgent(true)
    ->set('writable_mode', 'chmod')
    ->set('deploy_path', '~/html/devTypo3ddev/beta/'); 
*/   
    
// Tasks
task('pwd', function () {
    $result = run('pwd');
    writeln("Current dir: $result");
});


// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

