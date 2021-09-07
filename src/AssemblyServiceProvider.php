<?php

namespace Based\AssemblyAI;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class AssemblyServiceProvider extends PackageServiceProvider
{
    public function register()
    {
        parent::register();

        $this->app->bind(AssemblyAI::class, function () {
            return new AssemblyAI(config('assemblyai.token'));
        });
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('assemblyai')
            ->hasConfigFile();
    }
}
