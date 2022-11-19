<?php

declare(strict_types=1);

namespace App\Enums;

enum EnumActions: string
{
    case Manage = 'manage';
    case Hire = 'recruter';
    case Do = 'faire';
}
