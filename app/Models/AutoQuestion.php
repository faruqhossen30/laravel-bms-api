<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'game_id', 'game_name', 'status'];

    public function options()
    {
        return $this->hasMany(AutoOption::class, 'auto_question_id');
    }
}
