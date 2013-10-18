<?php

namespace Formativ\Deployment\Command\Distribute;

use Formativ\Deployment\DistributionInterface;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class Prepare
extends Command
{
    protected $name = "deployment:distribute:prepare";

    protected $description = "Creates and cleans the distribution folder.";

    protected $distribution;

    public function __construct(DistributionInterface $distribution)
    {
        parent::__construct();
        $this->distribution = $distribution;
    }

    // ...
}