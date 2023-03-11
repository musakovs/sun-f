<?php

use Maxim\SunFinance\ArgumentsParser;
use Maxim\SunFinance\ConsoleApp;
use Maxim\SunFinance\ConsoleReport;
use Maxim\SunFinance\Csv;
use Maxim\SunFinance\FileReport;
use Maxim\SunFinance\Report\DataProvider;
use Maxim\SunFinance\CsvReportCommand;

require_once 'vendor/autoload.php';

$app = new ConsoleApp(
    new ArgumentsParser()
);

$storage = new class implements \Maxim\SunFinance\DataStorageInterface {
    public function getAll(): array
    {
        return [
            ['date' => '2023-01-01', 'id' => 123132]
        ];
    }
};

$app->registerCommands([
    'report' => new CsvReportCommand(
        new DataProvider($storage),
        new Csv(),
        new FileReport(),
        new ConsoleReport()
    )
]);

$app->run($argv);
