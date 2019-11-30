<?php

namespace Fomvasss\ItsLte\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lte:install';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install all of the Lte resources';
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->comment('Publishing Lte Configuration...');
        $this->callSilent('vendor:publish', ['--tag' => 'lte-config']);

        $this->comment('Publishing Lte Assets...');
        $this->callSilent('vendor:publish', ['--tag' => 'lte-assets']);

        $this->comment('Publishing Lte Lang...');
        $this->callSilent('vendor:publish', ['--tag' => 'lte-lang']);

        $this->comment('Publishing Lte Views Content...');
        $this->callSilent('vendor:publish', ['--tag' => 'lte-view-content']);
        $this->callSilent('vendor:publish', ['--tag' => 'lte-view-auth']);
        $this->callSilent('vendor:publish', ['--tag' => 'lte-view-layouts']);

        $this->comment('Publishing LFM Config & Assets...');
        $this->callSilent('vendor:publish', ['--tag' => 'lfm_config']);
        $this->callSilent('vendor:publish', ['--tag' => 'lfm_public']);

        $this->comment('Creating storage link...');
        $this->callSilent('storage:link');

        $this->info('Lte scaffolding installed successfully.');
    }
}