<?php

namespace Formativ\Deployment\Command\Asset;

use Formativ\Deployment\Asset\ManagerInterface;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class Minify
extends Command
{
    protected $name = "deployment:asset:minify";

    protected $description = "Minifies multiple resource files.";

    public function __construct(ManagerInterface $manager)
    {
        parent::__construct();
        $this->manager = $manager;
    }

    // ...
}