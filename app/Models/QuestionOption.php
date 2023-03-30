<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    use HasFactory;
    protected $fillable = ['matche_id', 'matche_question_id', 'title', 'bet_rate', 'is_hide', 'is_win', 'is_loss', 'status'];
}
