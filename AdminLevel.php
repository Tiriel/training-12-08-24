<?php

enum AdminLevel
{
    case Admin;
    case SuperAdmin;

    public function label(): string
    {
        return match ($this) {
            self::Admin => 'Admin',
            self::SuperAdmin => 'SuperAdmin',
        };
    }
}
