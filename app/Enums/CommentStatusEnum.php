<?php

namespace App\Enums;

enum CommentStatusEnum: int
{
    case PENDING = 0;
    case REJECTED = 1;
    case ACCEPTED = 2;
}
