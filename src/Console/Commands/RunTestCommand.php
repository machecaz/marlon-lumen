<?php

namespace Marlon\Lumen\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Process\Process;

class RunTestCommand extends Command
{
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run tests (marlon-lumen package).';

    /**
     * Filesystem instance.
     */
    protected FileSystem $fileSystem;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:run';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Filesystem $fileSystem)
    {
        parent::__construct();

        $this->fileSystem = $fileSystem;
    }
    
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $process = new Process(['./vendor/phpunit/phpunit/phpunit', './tests']);

        $process->start();
    
        $iterator = $process->getIterator($process::ITER_SKIP_ERR | $process::ITER_KEEP_OUTPUT);
    
        foreach ($iterator as $data) {
            echo $data."\n";
        }
    }
}
