<?php

namespace Formativ\Deployment\Asset;

use Formativ\Deployment\MachineInterface;
use Illuminate\Filesystem\Filesystem;

class Watcher implements WatcherInterface
{
    protected $files;

    protected $machine;

    public function __construct(Filesystem $files, MachineInterface $machine)
    {
        $this->files   = $files;
        $this->machine = $machine;
    }

    public function watch()
    {
        // ...watch assets for changes
    }
}