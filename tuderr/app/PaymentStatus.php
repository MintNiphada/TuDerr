<?php

namespace App;

enum PaymentStatus : string
{
    case PENDING = 'pending';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
}
