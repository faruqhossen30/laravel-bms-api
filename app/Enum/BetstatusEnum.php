<?php
namespace App\Enum;

enum BetstatusEnum:string{
    case WIN = 'win';
    case LOSS = 'loss';
    case PENDING = 'pending';
    case OTHERS = 'others';
}
