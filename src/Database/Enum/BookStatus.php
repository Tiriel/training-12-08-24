<?php

namespace App\Database\Enum;

enum BookStatus: string
{
    case Available = 'available';
    case Borrowed = 'borrowed';
}
