@servers(['local' => '127.0.0.1', 'production' => 'bubbling-darkness'])

@setup
    $repository = 'git@github.com:bakerkretzmar/theartsabstract.git';
    $health = 'https://theartsabstract.ca';

    $base = '/home/forge/theartsabstract.ca';
    $theme = "{$base}/web/app/themes/theartsabstract";

    function write(string $message, string $colour = 'gray') {
        return "echo \"\033[" . ['red' => '31', 'green' => '32', 'gray' => '90'][$colour] . "m" . $message . "\033[0m\"";
    }
@endsetup

@story('deploy')
    git
    wp
    theme
    assets
    fpm
    health
@endstory

@task('git', ['on' => 'production'])
    {{ write('Pulling latest code') }}
    cd {{ $base }}
    git pull
@endtask

@task('wp', ['on' => 'production'])
    {{ write('Installing Bedrock/WordPress Composer dependencies') }}
    cd {{ $base }}
    composer install --no-interaction --quiet --no-dev
@endtask

@task('theme', ['on' => 'production'])
    {{ write('Installing theme Composer dependencies') }}
    cd {{ $theme }}
    composer install --no-interaction --quiet --no-dev
@endtask

@task('assets', ['on' => 'production'])
    {{ write('Building theme assets') }}
    cd {{ $theme }}
    npm ci
    npm run build
@endtask

@task('fpm', ['on' => 'production'])
    {{ write('Reloading PHP-FPM') }}
    ( flock -w 10 9 || exit 1; sudo -S service php8.0-fpm reload ) 9>/tmp/fpmlock
@endtask

@task('health', ['on' => 'local'])
    @if ($health)
        {{ write('Performing health check') }}
        if [ "$(curl --silent --output /dev/null --write-out "%{http_code}\n" {{ $health }})" = "200" ]; then
            {{ write("Health check OK for {$health}", 'green') }}
        else
            {{ write("Health check FAILED for {$health}", 'red') }}
        fi
    @else
        {{ write('No health check set up', 'red') }}
    @endif
@endtask
