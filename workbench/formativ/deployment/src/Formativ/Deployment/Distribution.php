<?php

namespace Formativ\Deployment;

use Formativ\Deployment\MachineInterface;
use Illuminate\Filesystem\Filesystem;

class Distribution implements DistributionInterface
{
    protected $files;

    protected $machine;

    public function __construct(Filesystem $files, MachineInterface $machine)
    {
        $this->files   = $files;
        $this->machine = $machine;
    }

    public function prepare($source, $target)
    {
        // ...copy + clean files for distribution
    }

    public function sync()
    {
        // ...sync distribution files to remote server
    }
}