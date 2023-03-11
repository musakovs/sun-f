<?php

use Maxim\SunFinance\ArgumentsParser;
use PHPUnit\Framework\TestCase;

class ArgumentParserTest extends TestCase
{
    private array $arguments = [
        '-import',
        '--date=2023-01-05',
        '--file=file.csv',
        'report'
    ];

    public function testMakeOptions()
    {
        $parser = new ArgumentsParser();

        $this->assertEquals(
            [
                'date' => '2023-01-05',
                'file' => 'file.csv'
            ],
            $parser->makeOptions($this->arguments)
        );
    }

    public function testMakeFlags()
    {
        $parser = new ArgumentsParser();

        $this->assertEquals(
            ['import'],
            $parser->makeFlags($this->arguments)
        );
    }
}