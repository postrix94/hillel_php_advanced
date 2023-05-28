<?php


namespace App\Interfaces;

interface IContactBuilder
{
    public function name(string $name):IContactBuilder;

    public function surname(string $surname):IContactBuilder;

    public function email(string $email):IContactBuilder;

    public function phone(string $phone):IContactBuilder;

    public function address(string $address):IContactBuilder;

    public function reset(): void;
}