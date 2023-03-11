<?php

use Maxim\SunFinance\ArgumentsParser;
use Maxim\SunFinance\ConsoleApp;
use Maxim\SunFinance\ConsoleReport;
use Maxim\SunFinance\Csv;
use Maxim\SunFinance\DataStorageInterface;
use Maxim\SunFinance\FileReport;
use Maxim\SunFinance\Report\DataProvider;
use Maxim\SunFinance\CsvReportCommand;

require_once 'vendor/autoload.php';

$app = new ConsoleApp(
    new ArgumentsParser()
);

$storage = new class implements DataStorageInterface {
    public function getAll(): array
    {
        return (new Csv())->fromFile('/app/examples/report.csv');
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
