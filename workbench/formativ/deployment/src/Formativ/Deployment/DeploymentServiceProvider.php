<?php

namespace Formativ\Deployment;

use Illuminate\Support\ServiceProvider;

class DeploymentServiceProvider extends ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        $this->app->bind("deployment.asset.manager", function()
        {
            return new Asset\Manager($this->app->make("files"), $this->app->make("deployment.machine"));
        });

        $this->app->bind("deployment.asset.watcher", function()
        {
            return new Asset\Watcher($this->app->make("files"), $this->app->make("deployment.machine"));
        });

        $this->app->bind("deployment.distribution", function()
        {
            return new Distribution($this->app->make("files"), $this->app->make("deployment.machine"));
        });

        $this->app->bind("deployment.machine", function()
        {
            return new Machine($this->app->make("files"));
        });

        $this->app->bind("deployment.command.asset.combine", function()
        {
            return new Command\Asset\Combine($this->app->make("deployment.asset.manager"));
        });

        $this->app->bind("deployment.command.asset.minify", function()
        {
            return new Command\Asset\Minify($this->app->make("deployment.asset.manager"));
        });

        $this->app->bind("deployment.command.asset.watch", function()
        {
            return new Command\Asset\Watch($this->app->make("deployment.asset.manager"));
        });

        $this->app->bind("deployment.command.distribute.prepare", function()
        {
            return new Command\Distribute\Prepare($this->app->make("deployment.distribution"));
        });

        $this->app->bind("deployment.command.distribute.sync", function()
        {
            return new Command\Distribute\Sync($this->app->make("deployment.distribution"));
        });

        $this->app->bind("deployment.command.machine.add", function()
        {
            return new Command\Machine\Add($this->app->make("deployment.machine"));
        });

        $this->app->bind("deployment.command.machine.remove", function()
        {
            return new Command\Machine\Remove($this->app->make("deployment.machine"));
        });

        $this->commands(
            "deployment.command.asset.combine",
            "deployment.command.asset.minify",
            "deployment.command.asset.watch",
            "deployment.command.distribute.prepare",
            "deployment.command.distribute.sync",
            "deployment.command.machine.add",
            "deployment.command.machine.remove"
        );
    }

    public function boot()
    {
        $this->package("formativ/deployment");

        include __DIR__ . "/../../helpers.php";
        include __DIR__ . "/../../macros.php";
    }

    public function provides()
    {
        return [
            "deployment.asset.manager",
            "deployment.asset.watcher",
            "deployment.distribution",
            "deployment.machine",
            "deployment.command.asset.combine",
            "deployment.command.asset.minify",
            "deployment.command.asset.watch",
            "deployment.command.distribute.prepare",
            "deployment.command.distribute.sync",
            "deployment.command.machine.add",
            "deployment.command.machine.remove"
        ];
    }
}