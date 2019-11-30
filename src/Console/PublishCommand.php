<?php

namespace Fomvasss\ItsLte\Console;

use Illuminate\Console\Command;

class PublishCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lte:publish {--force : Overwrite any existing files} {--tag= : Tag name}';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish all of the Lte resources';
    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->option('tag')) {
            $this->callSilent('vendor:publish', [
                '--tag' => $this->option('tag'),
                '--force' => $this->option('force'),
            ]);
            $this->info('Publish success');
        } elseif ($this->confirm('Publish all LTE resources?', false)) {
            $this->call('vendor:publish', [
                '--tag' => 'lte-config',
                '--force' => $this->option('force'),
            ]);
            $this->call('vendor:publish', [
                '--tag' => 'lte-assets',
                '--force' => $this->option('force'),
            ]);
            $this->call('vendor:publish', [
                '--tag' => 'lte-lang',
                '--force' => $this->option('force'),
            ]);
            $this->call('vendor:publish', [
                '--tag' => 'lte-views',
                '--force' => $this->option('force'),
            ]);
        }
    }
}