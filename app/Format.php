<?php

namespace App;

use App\Interfaces\IFormat;

class Format implements IFormat
{
    private string $format;

    public function __construct(string $format)
    {
        $this->format = $format;
    }

    public function getFormat(string $string): string
    {
        switch ($this->format) {
            case 'raw' :
                {
                    return $string;
                }
                break;
            case 'with_date':
                {
                    return date('Y-m-d H:i:s') . $string;
                }
                break;
            case 'with_date_and_details':
                {
                    return date('Y-m-d H:i:s') . $string . ' - With some details';
                }
                break;
            default:
            {
                die('Error format');
            }
        }
    }
}