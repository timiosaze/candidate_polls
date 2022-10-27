<?php

namespace Database\Seeders;

use App\Models\Candidate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
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
                "party_id" => 1,
                "name" => "Asiwaju Bola Tinubu",
                "last_political_position" => "Governor of Lagos State",
                "speech" => "We will construct a society where the vulnerable, the weak, the disadvantaged and the elderly are attended to and loved",
                "vice_name" => "Mr. Kashim Shettima"
            ],
            [
                "party_id" => 2,
                "name" => "Atiku Abubakar",
                "last_political_position" => "Vice President of Nigeria",
                "speech" => "And I plegde to work with a sense of unity and sense of belonging with all Nigerians irrespective of their area of origin",
                "vice_name" => "Dr. Ifeanyi Arthur Okowa"
            ],
            [
                "party_id" => 3,
                "name" => "Peter Gregory Obi",
                "last_political_position" => "Governor of Anambra State",
                "speech" => "If elected the next president of Nigeria, youths would be the main proponents of my main agenda to transform Nigeria from a consuming nation to a producing nation",
                "vice_name" => "Datti Baba-Ahmed"
            ],
            [
                "party_id" => 4,
                "name" => "Dr Rabiu Kwankwaso",
                "last_political_position" => "Minister of Defence",
                "speech" => "Our government will ensure that adequate roads are provided, ensure that trains are working",
                "vice_name" => "Bishop Isaac Idahosa"
            ]
        ];

        foreach ($array as $candidate) {
            Candidate::create([
                'party_id' => $candidate["party_id"],
                'name' => $candidate["name"],
                'last_political_position' => $candidate["last_political_position"],
                'speech' => $candidate["speech"],
                'vice_name' => $candidate["vice_name"],
            ]);
        }
    }
}
