<?php

namespace Formativ\Deployment;

use Illuminate\Filesystem\Filesystem;

class Machine implements MachineInterface
{
    protected $environment;

    protected $files;

    public function __construct(Filesystem $files)
    {
        $this->files = $files;
    }

    public function getEnvironment()
    {
        // ...get the current environment
    }

    public function setEnvironment($environment)
    {
        // ...set the current environment
    }
}