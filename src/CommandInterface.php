<?php

namespace Maxim\SunFinance;

interface CommandInterface
{
    public function run(array $options, array $flags);
}