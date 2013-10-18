<?php

namespace Formativ\Deployment\Command\Machine;

use Formativ\Deployment\MachineInterface;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class Add
extends Command
{
    protected $name = "deployment:machine:add";

    protected $description = "Adds the current machine to an environment.";

    protected $machine;

    public function __construct(MachineInterface $machine)
    {
        parent::__construct();
        $this->machine = $machine;
    }

    // ...
}