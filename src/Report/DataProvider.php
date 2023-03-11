<?php

namespace Maxim\SunFinance\Report;

use Maxim\SunFinance\DataStorageInterface;

class DataProvider
{
    private DataStorageInterface $dataStorage;

    public function __construct(DataStorageInterface $dataStorage)
    {
        $this->dataStorage = $dataStorage;
    }

    public function all(): array
    {
        return $this->dataStorage->getAll();
    }

    public function getFilteredByDate(string $date): array
    {
        return array_filter($this->all(), function($item) use ($date) {
            return $item['date'] === $date;
        });
    }
}
