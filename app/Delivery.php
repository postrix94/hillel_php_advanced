<?php


namespace App;

use App\Interfaces\IDelivery;

class Delivery implements IDelivery
{
    private string $delivery;

    public function __construct(string $delivery)
    {
        $this->delivery = $delivery;
    }

    public function deliver(string $format)
    {
        switch ($this->delivery) {
            case 'by_email' :
                {
                    echo "Вывод формата ({$format}) по имейл";
                }
                break;
            case 'by_sms':
                {
                    echo "Вывод формата ({$format}) в смс";
                }
                break;
            case 'to_console':
                {
                    echo "Вывод формата ({$format}) в консоль";
                }
                break;
            default:
            {
                die('Error deliver');
            }
        }
    }
}