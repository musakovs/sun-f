<?php

namespace Maxim\SunFinance;

use Maxim\SunFinance\Report\DataProvider;
use Maxim\SunFinance\Report\DateFilter;

class CsvReportCommand implements CommandInterface
{
    private DataProvider $dataProvider;
    private Csv $csv;
    private FileReport $fileReport;
    private ConsoleReport $consoleReport;

    public function __construct(
        DataProvider $dataProvider,
        Csv $csv,
        FileReport $fileReport,
        ConsoleReport $consoleReport
    )
    {
        $this->dataProvider = $dataProvider;
        $this->csv = $csv;
        $this->fileReport = $fileReport;
        $this->consoleReport = $consoleReport;
    }

    public function run(array $options, array $flags): void
    {
        if (in_array('import', $flags)) {
            $this->fileReport->make($options['file'], $this->prepareData($options));
        } else {
            $this->consoleReport->make($this->prepareData($options));
        }
    }

    private function prepareData(array $options): string
    {
        return $this->csv->make(
            (new DateFilter($this->dataProvider, $options['date']))->jsonSerialize()
        );
    }
}
