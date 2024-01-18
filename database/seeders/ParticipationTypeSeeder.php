<?php

namespace Database\Seeders;

use App\Models\ParticipationType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ParticipationType::create([
            'name'          => 'Host',
            'description'   => 'A room creator able to invite other people',
        ]);

        ParticipationType::create([
            'name'          => 'Guest',
            'description'   => 'An person invited by the Host',
        ]);
    }
}
