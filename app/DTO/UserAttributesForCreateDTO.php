<?php

namespace App\DTO;

class UserAttributesForCreateDTO
{
    private string $name;
    private string $email;
    private string $password;
    private int $is_admin;


    public function __construct(string $name, string $email, string $password, int $is_admin)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->is_admin = $is_admin;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getIsAdmin(): int
    {
        return $this->is_admin;
    }
}

