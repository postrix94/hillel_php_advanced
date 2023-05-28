<?php

namespace App;

use App\Interfaces\IContactBuilder;

class ContactBuilder implements Interfaces\IContactBuilder
{
    private Contact $contact;

    public function __construct() {
       $this->create();
    }

    protected function create(): IContactBuilder {
        $this->contact = new Contact();
        return $this;
    }

    public function setName(string $name): IContactBuilder
    {
        $this->contact->setName($name);
        return $this;
    }

    public function setSurname(string $surname): IContactBuilder
    {
        $this->contact->setSurname($surname);
        return $this;
    }

    public function setEmail(string $email): IContactBuilder
    {
        $this->contact->setEmail($email);
        return $this;
    }

    public function setPhone(string $phone): IContactBuilder
    {
        $this->contact->setPhone($phone);
        return $this;
    }

    public function setAddress(string $address): IContactBuilder
    {
        $this->contact->setAddress($address);
        return $this;
    }

    public function reset():void
    {
        $this->create();
    }

    public function build(): Contact {
        $contact = $this->contact;;
        $this->reset();
        return $contact;
    }
}