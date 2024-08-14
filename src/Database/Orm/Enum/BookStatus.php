<?php

namespace App\Database\Orm\Enum;

enum BookStatus: string
{
    case Available = 'available';
    case Borrowed = 'borrowed';
}
