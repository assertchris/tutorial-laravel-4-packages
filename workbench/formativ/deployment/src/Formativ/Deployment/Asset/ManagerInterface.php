<?php

namespace Formativ\Deployment\Asset;

interface ManagerInterface
{
    public function add($source, $target);

    public function remove($target);

    public function combine();

    public function minify();
}