<?php

namespace App\Models;

use App\Enum\BetstatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'matche_id', 'question_id', 'option_id', 'club_id', 'sponsor_id', 'bet_amount', 'bet_rate', 'return_amount', 'club_commission', 'sponsor_commission', 'match_title', 'question_title', 'option_title', 'status'];


    protected $casts = [
        'status' => BetstatusEnum::class,
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }

}
