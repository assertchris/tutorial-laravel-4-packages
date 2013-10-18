<?php

namespace Formativ\Deployment;

interface DistributionInterface
{
    public function prepare($source, $target);

    public function sync();
}