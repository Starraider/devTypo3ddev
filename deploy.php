<?php
namespace Deployer;

require 'recipe/typo3.php';

// Project name
set('application', 'devTypo3ddev');
set('typo3_webroot', 'public');
set('http_user', 'p203341');



// Project repository
set('repository', 'https://github.com/Starraider/devTypo3ddev.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
set('shared_dirs', [
    'config'
]);
set('shared_files', [
    'composer.json',
    '{{typo3_webroot}}/typo3conf/AdditionalConfiguration.php',
    '{{typo3_webroot}}/typo3conf/LocalConfiguration.php',
    '{{typo3_webroot}}/typo3conf/PackageStates.php'
]);


// Writable dirs by web server 
add('writable_dirs', [
    'config'
]);

// Misc
set('allow_anonymous_stats', false);

// Hosts

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
    
// Tasks
task('pwd', function () {
    $result = run('pwd');
    writeln("Current dir: $result");
});


// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

