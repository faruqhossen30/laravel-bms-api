<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutoOption extends Model
{
    use HasFactory;

    protected $fillable = ['auto_question_id', 'title', 'bet_rate', 'status'];
}
