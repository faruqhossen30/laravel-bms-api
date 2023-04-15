<?php
namespace App\Enum;

enum BetstatusEnum:string{
    case WIN = 'win';
    case LOSS = 'loss';
    case RETURN = 'return';
    case PENDING = 'pending';
    case OTHERS = 'others';
}
