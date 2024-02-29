<?php
declare(strict_types=1);


class Contact
{
    private int $contact_id;
    private string $firstname;
    private string $lastname;
    private string $email;
    private string $phone_number;

    public function getContactId(): int
    {
        return $this->contact_id;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }
    public function getLastname(): string
    {
        return $this->lastname;
    }
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function getPhoneNumber(): string
    {
        return $this->phone_number;
    }
    public function setPhoneNumber(string $phone_number): void
    {
        $this->phone_number = $phone_number;
    }

    function __construct(int $contact_id, string $firstname,string $lastname,string $email,string $phone_number)
    {
        $this->contact_id =$contact_id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->phone_number = $phone_number;
    }
}

