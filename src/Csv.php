<?php

namespace Maxim\SunFinance;

class Csv
{
    public function make(array $data): string
    {
        if (empty($data)) {
            return '';
        }

        $csv = '';

        foreach ($data as $k => $value) {
            if ($k === 0) {
                $csv .= implode(',', array_keys($value));
            }

            $csv .= PHP_EOL . implode(',', $value);
        }

        return $csv;
    }
}
