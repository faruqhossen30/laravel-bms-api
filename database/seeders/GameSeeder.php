<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gamelist = [
            [
                "id" => 1,
                "name" => "Cricket",
                "image" => "uploads/games/cricket.png",
            ],
            [
                "id" => 2,
                "name" => "Football",
                "image" => "uploads/games/footbal.png",
            ],
            [
                "id" => 3,
                "name" => "BasketBall",
                "image" => "uploads/games/basketball.png",
            ],
            [
                "id" => 4,
                "name" => "Hocky",
                "image" => "uploads/games/cricket.png",
            ],
            [
                "id" => 5,
                "name" => "Tenis",
                "image" => "uploads/games/tenis.png",
            ],
            [
                "id" => 6,
                "name" => "Voliball",
                "image" => "uploads/games/volyball.png",
            ],
            [
                "id" => 7,
                "name" => "Table Tanis",
                "image" => "uploads/games/tabletanis.png",
            ],
            [
                "id" => 8,
                "name" => "Badminton",
                "image" => "uploads/games/badminton.png",
            ]
        ];

        foreach($gamelist as $game){
            Game::create($game);
        }


    }
}
