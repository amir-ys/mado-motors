<?php

namespace App\Enums;

enum ProductReviewStatusEnum: int
{
    case PENDING = 0;
    case ACCEPTED = 1;
    case REJECTED = 2;
}
