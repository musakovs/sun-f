<?php

namespace Maxim\SunFinance;

class ArgumentsParser
{
    public function makeOptions(array $arguments): array
    {
        $options = [];

        foreach ($arguments as $argument) {
            if (substr($argument, 0, 2) === '--') {
                $values = explode('=', $argument);
                $options[substr($values[0], 2)] = $values[1];
            }
        }

        return $options;
    }

    public function makeFlags(array $arguments): array
    {
        $flags = [];

        foreach ($arguments as $argument) {
            if (substr($argument, 0, 1) === '-' && substr($argument, 0, 2) !== '--') {
                $flags[] = substr($argument, 1);
            }
        }

        return $flags;
    }

    public function getCommandName(array $arguments): string
    {
        return $arguments[1];
    }
}
