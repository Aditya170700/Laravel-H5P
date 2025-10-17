<?php

namespace Adityaricki\LaravelH5P;

use Adityaricki\LaravelH5P\Models\H5PContent;
use Adityaricki\LaravelH5P\Models\H5PLibrary;
use Adityaricki\LaravelH5P\Policies\H5PContentPolicy;
use Adityaricki\LaravelH5P\Policies\H5PLibraryPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        H5PContent::class => H5PContentPolicy::class,
        H5PLibrary::class => H5PLibraryPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
