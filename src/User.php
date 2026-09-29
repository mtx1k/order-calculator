<?php

declare(strict_types=1);

class User
{
    private string $name;
    private string $email;
    private UserType $userType;

    public function __construct(string $name, string $email, UserType $userType)
    {
        $this->name = $name ?? '';
        $this->email = $email ?? '';
        $this->userType = $userType;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getUserType(): UserType
    {
        return $this->userType;
    }
}
