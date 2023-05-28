<?php


namespace App;


class Contact
{
    private $name;
    private $surname;
    private $email;
    private $phone;
    private $address;

    public function setName(string $name):void {
        $this->name = $name;
    }

    public function setSurname(string $surname):void {
        $this->surname = $surname;
    }

    public function setPhone(string $phone):void {
        $this->phone = $phone;
    }

    public function setEmail(string $email):void {
        $this->email = $email;
    }

    public function setAddress(string $address):void {
        $this->address = $address;
    }

}