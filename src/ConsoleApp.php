<?php

namespace Maxim\SunFinance;

class ConsoleApp
{
    /**
     * @var CommandInterface[]
     */
    private array $commands;

    private ArgumentsParser $argumentsParser;

    public function __construct(ArgumentsParser $argumentsParser)
    {
        $this->argumentsParser = $argumentsParser;
    }

    /**
     * @param CommandInterface[] $commands
     * @return void
     */
    public function registerCommands(array $commands)
    {
        $this->commands = $commands;
    }

    public function run(array $arguments)
    {
        $command = $this->getCommand($this->argumentsParser->getCommandName($arguments));

        $command && $command->run(
            $this->argumentsParser->makeOptions($arguments),
            $this->argumentsParser->makeFlags($arguments)
        );
    }

    private function getCommand(string $command): ?CommandInterface
    {
        return $this->commands[$command] ?? null;
    }


}
