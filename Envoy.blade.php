@servers(['local' => '127.0.0.1', 'production' => 'bubbling-darkness'])

@setup
    $repository = 'git@github.com:bakerkretzmar/theartsabstract.git';
    $branch = 'master';

    $base = '/home/forge/theartsabstract.ca';
    $theme = $base . '/web/app/themes/theartsabstract';

    function output($before, $message, $colour) {
        $c = ['green' => '32', 'magenta' => '35', 'cyan' => '36'][$colour];
        return "echo '" . $before . " \033[" . $c . "m" . $message . "\033[0m';";
    }
@endsetup

@story('deploy')
    start
    git
    composer-wp
    composer-theme
    assets
    fpm
    finish
@endstory

@task('start', ['on' => 'production'])
    {{ output('🛫', "Deploying '$branch' branch to production...", 'cyan') }}
@endtask

@task('git', ['on' => 'production'])
    {{ output('↪︎', 'Updating repository...', 'green') }}
    cd {{ $base }}
    git pull
@endtask

@task('composer-wp', ['on' => 'production'])
    {{ output('↪︎', 'Installing Bedrock/WordPress dependencies...', 'green') }}
    cd {{ $base }}
    composer install -n -q -o --prefer-dist --no-dev
@endtask

@task('composer-theme', ['on' => 'production'])
    {{ output('↪︎', 'Installing theme dependencies...', 'green') }}
    cd {{ $theme }}
    composer install -n -q -o --prefer-dist --no-dev
@endtask

@task('assets', ['on' => 'production'])
    {{ output('↪︎', 'Building theme assets...', 'green') }}
    cd {{ $theme }}
    trash ./dist
    yarn &> /dev/null
    yarn prod &> /dev/null
@endtask

@task('fpm', ['on' => 'production'])
    {{ output('↪︎', 'Reloading php-fpm...', 'green') }}
    sudo service php7.3-fpm reload
@endtask

@task('finish', ['on' => 'local'])
    {{ output('🚀', 'Deploy successful!', 'magenta') }}
    afplay /System/Library/Sounds/Submarine.aiff
@endtask
