<?php

namespace App\Database\Enum;

enum UserRole: string
{
    case User = 'user';
    case Admin = 'admin';
}
