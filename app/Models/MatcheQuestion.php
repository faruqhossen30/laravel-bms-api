<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatcheQuestion extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'matche_id', 'is_hide', 'status'];

    public function options()
    {
        // return $this->hasMany(QuestionOption::class,'matche_question_id','matche_id');
        return $this->hasMany(QuestionOption::class,'matche_question_id');
    }

}
