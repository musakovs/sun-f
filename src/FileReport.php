<?php

namespace Maxim\SunFinance;

class FileReport
{
    public function make(string $filename, string $content)
    {
        $fileName = '/app/' . $filename;

        file_put_contents($filename, $content);


        echo $filename . ' generated' . PHP_EOL;
    }
}