<?php

namespace App\Enums;

enum UserRoleEnum: string
{
    case ADMIN = 'Admin';
    case AGENT = 'Agent';
    case USER = 'User';
}
