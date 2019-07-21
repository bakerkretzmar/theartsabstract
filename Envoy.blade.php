@servers(['local' => '127.0.0.1', 'production' => 'bubbling-darkness'])

@setup
    $repository = 'git@github.com:bakerkretzmar/theartsabstract.git';
    $branch = ['production' => 'master'][$stage];

    $base = [
        'production' => '/home/forge/theartsabstract.ca',
    ][$stage];

    $theme = $base . '/web/app/themes/theartsabstract';

    function output($before, $message, $colour) {
        $c = ['green' => '32', 'magenta' => '35', 'cyan' => '36'][$colour];
        return "echo '" . $before . " \033[" . $c . "m" . $message . "\033[0m';";
    }
@endsetup

@story('deploy')
    start
    git
    composer
    assets
    fpm
    finish
@endstory

@task('start', ['on' => $stage])
    {{ output('🛫', "Deploying branch $branch to $stage...", 'cyan') }}
@endtask

@task('git', ['on' => $stage])
    {{ output('↪︎', 'Updating repository...', 'green') }}
    cd {{ $base }}
    git pull
@endtask

@task('composer', ['on' => $stage])
    {{ output('↪︎', 'Installing dependencies...', 'green') }}
    cd {{ $base }}
    composer install -n -q -o --prefer-dist {{ $stage === 'production' ? '--no-dev' : '' }}
@endtask

@task('assets', ['on' => $stage])
    {{ output('↪︎', 'Building assets...', 'green') }}
    cd {{ $theme }}
    rm -rf ./dist
    npm run production
@endtask

@task('fpm', ['on' => $stage])
    {{ output('↪︎', 'Reloading php-fpm...', 'green') }}
    sudo service php7.3-fpm reload
@endtask

@task('finish', ['on' => 'local'])
    {{ output('🚀', 'Deploy successful!', 'magenta') }}
    afplay /System/Library/Sounds/Submarine.aiff -v 35
@endtask
