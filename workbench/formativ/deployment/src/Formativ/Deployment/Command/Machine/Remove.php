<?php

namespace Formativ\Deployment\Command\Machine;

use Formativ\Deployment\MachineInterface;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class Remove
extends Command
{
    protected $name = "deployment:machine:remove";

    protected $description = "Removes the current machine from an environment.";

    protected $machine;

    public function __construct(MachineInterface $machine)
    {
        parent::__construct();
        $this->machine = $machine;
    }

    // ...
}