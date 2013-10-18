<?php

namespace Formativ\Deployment\Command\Distribute;

use Formativ\Deployment\DistributionInterface;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class Sync
extends Command
{
    protected $name = "deployment:distribute:sync";

    protected $description = "Syncs changes to a target.";

    protected $distribution;

    public function __construct(DistributionInterface $distribution)
    {
        parent::__construct();
        $this->distribution = $distribution;
    }

    // ...
}