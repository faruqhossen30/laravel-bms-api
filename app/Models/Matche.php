<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matche extends Model
{
    use HasFactory;
    protected $fillable = ['team_one', 'team_two', 'team_one_flag', 'team_two_flag', 'statement', 'game_id', 'date_time', 'note','status'];

    protected $casts = [
        'date_time' => 'datetime'
    ];


    public function questions()
    {
        return $this->hasMany(MatcheQuestion::class,'matche_id');
    }



}
