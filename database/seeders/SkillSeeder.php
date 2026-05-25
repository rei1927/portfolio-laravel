<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonPath = '/Users/reizarachmattullah/.gemini/antigravity-ide/brain/d124ec05-4d68-4c0a-a79c-4b8a199be026/scratch/skills.json';
        if (file_exists($jsonPath)) {
            $skills = json_decode(file_get_contents($jsonPath), true);
            foreach ($skills as $skill) {
                \App\Models\Skill::create([
                    'subtitle' => $skill['subtitle'],
                    'title' => $skill['title'],
                    'description' => $skill['description'],
                    'tools' => $skill['tools'],
                    'order' => $skill['order'],
                ]);
            }
        }
    }
}
