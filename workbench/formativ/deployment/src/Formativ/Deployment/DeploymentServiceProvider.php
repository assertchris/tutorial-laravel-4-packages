<?php

namespace Formativ\Deployment;

use App;
use Illuminate\Support\ServiceProvider;

class DeploymentServiceProvider
extends ServiceProvider
{
    protected $defer = true;

    public function register()
    {
        App::bind("deployment.asset.manager", function()
        {
            return new Asset\Manager(
                App::make("files"),
                App::make("deployment.machine")
            );
        });

        App::bind("deployment.asset.watcher", function()
        {
            return new Asset\Watcher(
                App::make("files"),
                App::make("deployment.machine")
            );
        });

        App::bind("deployment.distribution", function()
        {
            return new Distribution(
                App::make("files"),
                App::make("deployment.machine")
            );
        });

        App::bind("deployment.machine", function()
        {
            return new Machine(
                App::make("files")
            );
        });

        App::bind("deployment.command.asset.combine", function()
        {
            return new Command\Asset\Combine(
                App::make("deployment.asset.manager")
            );
        });

        App::bind("deployment.command.asset.minify", function()
        {
            return new Command\Asset\Minify(
                App::make("deployment.asset.manager")
            );
        });

        App::bind("deployment.command.asset.watch", function()
        {
            return new Command\Asset\Watch(
                App::make("deployment.asset.manager")
            );
        });

        App::bind("deployment.command.distribute.prepare", function()
        {
            return new Command\Distribute\Prepare(
                App::make("deployment.distribution")
            );
        });

        App::bind("deployment.command.distribute.sync", function()
        {
            return new Command\Distribute\Sync(
                App::make("deployment.distribution")
            );
        });

        App::bind("deployment.command.machine.add", function()
        {
            return new Command\Machine\Add(
                App::make("deployment.machine")
            );
        });

        App::bind("deployment.command.machine.remove", function()
        {
            return new Command\Machine\Remove(
                App::make("deployment.machine")
            );
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