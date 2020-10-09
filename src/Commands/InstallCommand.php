<?php

namespace Boldstellar\Ecommerce\Commands;

use Illuminate\Console\Command;
use TCG\Voyager\Traits\Seedable;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Console\Input\InputOption;
use Boldstellar\Ecommerce\EcommerceServiceProvider;

class InstallCommand extends Command
{ 

    use Seedable;

    protected $seedersPath = __DIR__ . './../database/seeds/';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    protected $name = 'bs-ecommerce:install';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Boldstellar Ecommerce package';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function getOptions()
    {
        return [
            ['force', null, InputOption::NONE_VALUE, 'Migrating Database Forcefully using Force option', null]
        ];
    }

    protected function findComposer()
    {
        if (file_exists(getcwd() . '/composer.phar')) {
            return '"' . PHP_BINARY . '" ' . getcwd() . '/composer.phar';
        }

        return 'composer';
    }

    public function fire(Filesystem $filesystem)
    {
        return $this->handle($filesystem);
    }

    
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(Filesystem $filesystem)
    {
        $this->info('Publishing the ecommerce asset, database, seeds and config file ');
        $this->call('vendor:publish', ['--publish' => EcommerceServiceProvider::class, '--tag' => 'seeds']);

        $this->info('Migrating Database and Breads');
        $this->call('migrate', ['--force' => $this->option('force')]);

        $this->info('Updating Root package.json to include dependencies');
        $process = new Process([
            'npm', 'install', 'jquery', 'what-input', 'foundation-sites', 'scrollreveal', 'motion-ui', '--save-dev'
        ]);
        $process->setTimeout(null);
        $process->setWorkingDirectory(base_path())->mustRun();


        $this->info('Dumping the autoloaded files and reloading all new files');
        $process = new Process([$this->findComposer(), 'dump-autoload']);
        $process->setTimeout(null);
        $process->setWorkingDirectory(base_path())->mustRun();

        $this->info('Seeding Data into Database');
        $this->seed('EcommerceDatabaseSeeder');

        $this->info('Boldstellar Ecommerce installed Successfully, Enjoy! :)');

    }

    
}
