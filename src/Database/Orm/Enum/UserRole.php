<?php

namespace App\Database\Orm\Enum;

enum UserRole: string
{
    case User = 'user';
    case Admin = 'admin';
}
