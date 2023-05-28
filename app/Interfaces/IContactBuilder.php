<?php


namespace App\Interfaces;

interface IContactBuilder
{
    public function setName(string $name):IContactBuilder;

    public function setSurname(string $surname):IContactBuilder;

    public function setEmail(string $email):IContactBuilder;

    public function setPhone(string $phone):IContactBuilder;

    public function setAddress(string $address):IContactBuilder;

    public function reset(): void;
}