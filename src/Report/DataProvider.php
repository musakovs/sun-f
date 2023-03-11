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
}
