<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CandidateComment;
use App\Models\Prediction;
use App\Models\User;
use Database\Factories\CandidateCommentFactory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::factory()->count(100)
            ->has(CandidateComment::factory())
            ->has(Prediction::factory()
                ->count(37)
                ->state(new Sequence(
                    ['state_id' => 1],
                    ['state_id' => 2],
                    ['state_id' => 3],
                    ['state_id' => 4],
                    ['state_id' => 5],
                    ['state_id' => 6],
                    ['state_id' => 7],
                    ['state_id' => 8],
                    ['state_id' => 9],
                    ['state_id' => 10],
                    ['state_id' => 11],
                    ['state_id' => 12],
                    ['state_id' => 13],
                    ['state_id' => 14],
                    ['state_id' => 15],
                    ['state_id' => 16],
                    ['state_id' => 17],
                    ['state_id' => 18],
                    ['state_id' => 19],
                    ['state_id' => 20],
                    ['state_id' => 21],
                    ['state_id' => 22],
                    ['state_id' => 23],
                    ['state_id' => 24],
                    ['state_id' => 25],
                    ['state_id' => 26],
                    ['state_id' => 27],
                    ['state_id' => 28],
                    ['state_id' => 29],
                    ['state_id' => 30],
                    ['state_id' => 31],
                    ['state_id' => 32],
                    ['state_id' => 33],
                    ['state_id' => 34],
                    ['state_id' => 35],
                    ['state_id' => 36],
                    ['state_id' => 37],
                )) 
            )
            ->create();

    }
}
