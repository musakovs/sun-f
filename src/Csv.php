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

    public function fromFile(string $filename): array
    {
        $rows = [];

        if (($file = fopen($filename, 'r')) !== false) {
            $headers = fgetcsv($file);

            while (($data = fgetcsv($file)) !== false) {
                $row = array();
                foreach ($headers as $i => $header) {
                    $row[$header] = $data[$i];
                }
                $rows[] = $row;
            }

            fclose($file);
        }

        return $rows;
    }
}
