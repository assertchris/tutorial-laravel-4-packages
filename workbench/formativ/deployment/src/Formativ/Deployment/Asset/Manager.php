<?php

namespace Formativ\Deployment\Asset;

use Formativ\Deployment\MachineInterface;
use Illuminate\Filesystem\Filesystem;

class Manager implements ManagerInterface
{
    protected $files;

    protected $machine;

    protected $assets = [];

    public function __construct(Filesystem $files, MachineInterface $machine)
    {
        $this->files   = $files;
        $this->machine = $machine;
    }

    public function add($source, $target)
    {
        // ...add files to $assets
    }

    public function remove($target)
    {
        // ...remove files from $assets
    }

    public function combine()
    {
        // ...combine assets
    }

    public function minify()
    {
        // ...minify assets
    }
}