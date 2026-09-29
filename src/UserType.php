<?php

declare(strict_types=1);

class UserType
{

    private string $type;

    public function __construct(string $type)
    {
        $this->type = $type;
        $this->validateType();
    }

    private function validateType(): void
    {
        if (!in_array($this->type, ['regular', 'premium'], true)) {
            throw new InvalidArgumentException('Invalid user type');
        }
    }

    public function getType(): string
    {
        return $this->type;
    }
}
