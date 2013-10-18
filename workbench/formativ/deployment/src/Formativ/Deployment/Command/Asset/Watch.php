<?php

namespace Formativ\Deployment\Command\Asset;

use Formativ\Deployment\Asset\ManagerInterface;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class Watch
extends Command
{
    protected $name = "deployment:asset:watch";

    protected $description = "Watches resource files for changes.";

    public function __construct(ManagerInterface $manager)
    {
        parent::__construct();
        $this->manager = $manager;
    }

    // ...
}