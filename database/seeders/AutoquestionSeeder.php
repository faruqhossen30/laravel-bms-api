<?php

namespace Database\Seeders;

use App\Models\AutoOption;
use App\Models\AutoQuestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AutoquestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $auto_questions = array(
            array('title' => '⏱️Half Time Result⏱️','game_id' => '2','game_name' => 'Football','status' => '1'),
            array('title' => 'Full Time Total Goal','game_id' => '2','game_name' => 'Football','status' => '1')
          );

        foreach ($auto_questions as $question) {
            AutoQuestion::create([
                'title' => $question['title'],
                'game_id' => $question['game_id'],
                'game_name' => $question['game_name'],
            ]);
        }

        $auto_options = array(
            array('auto_question_id' => '1', 'title' => 'Team-1', 'bet_rate' => '1.00'),
            array('auto_question_id' => '1', 'title' => 'Team-2', 'bet_rate' => '2.00'),
            array('auto_question_id' => '2', 'title' => 'even', 'bet_rate' => '1.00'),
            array('auto_question_id' => '2', 'title' => 'odd', 'bet_rate' => '2.00'),
            array('auto_question_id' => '2', 'title' => 'no goal', 'bet_rate' => '3.00')
        );

        foreach ($auto_options as $option) {
            AutoOption::create([
                'auto_question_id' => $option['auto_question_id'],
                'title' => $option['title'],
                'bet_rate' => $option['bet_rate'],
                'status' => true,
            ]);
        }
    }
}
