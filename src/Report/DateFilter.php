<?php

namespace Maxim\SunFinance\Report;

class DateFilter implements \JsonSerializable
{
    private DataProvider $dataProvider;
    private ?string $date;

    public function __construct(DataProvider $dataProvider, ?string $date)
    {
        $this->dataProvider = $dataProvider;
        $this->date         = $date;
    }

    public function jsonSerialize()
    {
        return array_values(array_filter(
            $this->dataProvider->all(),
            [$this, 'dateMatches']
        ));
    }

    private function dateMatches(array $row): bool
    {
        if (is_null($this->date)) {
            return true;
        }

        return $this->date === date('Y-m-d', strtotime($row['paymentDate']));
    }
}