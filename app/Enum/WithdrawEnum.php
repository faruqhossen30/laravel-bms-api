<?php
namespace App\Enum;

enum WithdrawEnum:string{
    case PENDING = 'pending';
    case COMPLETE = 'complete';
    case CANCEL = 'cancel';
}
