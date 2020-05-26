<?php
namespace Deployer;

require 'recipe/typo3.php';

// Project name
set('application', 'devTypo3ddev');

// Project repository
set('repository', 'https://github.com/Starraider/devTypo3ddev.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);
set('allow_anonymous_stats', false);

// Hosts

host('beta')
    ->hostname('p203341.typo3server.info')
    ->stage('beta')
    ->user('p203341')
    ->port(22)
    ->set('deploy_path', '~/html/{{application}}');    
    
// Tasks

task('build', function () {
    run('cd {{release_path}} && build');
});

// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

