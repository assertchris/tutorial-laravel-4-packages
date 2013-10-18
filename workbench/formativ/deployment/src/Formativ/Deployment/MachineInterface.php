<?php

namespace Formativ\Deployment;

interface MachineInterface
{
    public function getEnvironment();

    public function setEnvironment($environment);
}