<?php

namespace Database\Seeders;

use App\Models\Party;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $array = [
            [
                "name" => "APC",
                "fullname" => "All Progressives Congress",
            ],
            [
                "name" => "PDP",
                "fullname" => "People's Democratic Party",
            ],
            [
                "name" => "LP",
                "fullname" => "Labour Party",
            ],
            [
                "name" => "NNPP",
                "fullname" => "New Nigeria Peoples Party",
            ]
        ];

        foreach ($array as $party) {
            Party::create([
                'name' => $party["name"],
                'fullname' => $party["fullname"]
            ]);
        }


    }
}
