<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Setting;
use App\Models\Experience;
use App\Models\Certification;
use App\Models\PortfolioItem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Admin User for Filament CMS
        User::updateOrCreate(
            ['email' => 'contact@reizarachmattullah.com'],
            [
                'name' => 'Reiza Rachmattullah',
                'password' => Hash::make('password'), // Seeding default secure password (user can change it)
            ]
        );

        // 2. Seed Settings
        Setting::updateOrCreate(
            ['id' => 1],
            [
                'name' => 'Reiza Rachmattullah',
                'headline' => 'Creative Designer',
                'email' => 'contact@reizarachmattullah.com',
                'cv_link' => 'https://drive.google.com/file/d/1_iANVY_1FMfxWjjvy6iJDwXFMS229zx5/view?usp=sharing',
                'profile_photo' => '/assets/Desain_tanpa_judul.svg',
                'second_photo' => '/assets/Desain_tanpa_judul.svg',
            ]
        );

        // 3. Seed Career / Experiences
        $experiences = [
            ['title' => 'Creative Designer', 'company' => 'TryHackMe LLC', 'period' => '2025 – Current'],
            ['title' => 'Founder/Creative Director', 'company' => 'DirectlyNik™', 'period' => '2023 – Current'],
            ['title' => 'Head of Design', 'company' => 'Involve', 'period' => '2024 – 2025'],
            ['title' => 'Chief Digital Marketing Executive', 'company' => 'Simplify-ERP®', 'period' => '2021 – 2023'],
            ['title' => 'Co-Founder', 'company' => 'GGHOSTMK', 'period' => '2020 – 2022'],
            ['title' => 'Marketing Designer & Video Editor', 'company' => 'Simplify-ERP®', 'period' => '2019 – 2021'],
            ['title' => 'Video Editor (contributor/project)', 'company' => 'UFC', 'period' => '2019'],
            ['title' => 'Web & Graphic Designer', 'company' => 'PeoplePerHour', 'period' => '2018 – 2020'],
            ['title' => 'Graphic Designer & Video Editor', 'company' => 'PeoplePerHour', 'period' => '2016 – 2018'],
            ['title' => 'Assistant Video Editor (project)', 'company' => 'UFC', 'period' => '2016'],
        ];

        Experience::truncate();
        foreach ($experiences as $idx => $exp) {
            Experience::create([
                'title' => $exp['title'],
                'company' => $exp['company'],
                'period' => $exp['period'],
                'order' => $idx,
            ]);
        }

        // 4. Seed Certifications (initially same list as career as per request)
        $certifications = [
            ['title' => 'Creative Designer', 'institution' => 'TryHackMe LLC', 'period' => '2025 – Current'],
            ['title' => 'Founder/Creative Director', 'institution' => 'DirectlyNik™', 'period' => '2023 – Current'],
            ['title' => 'Head of Design', 'institution' => 'Involve', 'period' => '2024 – 2025'],
            ['title' => 'Chief Digital Marketing Executive', 'institution' => 'Simplify-ERP®', 'period' => '2021 – 2023'],
            ['title' => 'Co-Founder', 'institution' => 'GGHOSTMK', 'period' => '2020 – 2022'],
            ['title' => 'Marketing Designer & Video Editor', 'institution' => 'Simplify-ERP®', 'period' => '2019 – 2021'],
            ['title' => 'Video Editor (contributor/project)', 'institution' => 'UFC', 'period' => '2019'],
            ['title' => 'Web & Graphic Designer', 'institution' => 'PeoplePerHour', 'period' => '2018 – 2020'],
            ['title' => 'Graphic Designer & Video Editor', 'institution' => 'PeoplePerHour', 'period' => '2016 – 2018'],
            ['title' => 'Assistant Video Editor (project)', 'institution' => 'UFC', 'period' => '2016'],
        ];

        Certification::truncate();
        foreach ($certifications as $idx => $cert) {
            Certification::create([
                'title' => $cert['title'],
                'institution' => $cert['institution'],
                'period' => $cert['period'],
                'order' => $idx,
            ]);
        }

        // 5. Seed Portfolio Items
        PortfolioItem::truncate();
        $jsonPath = database_path('seeders/portfolio_items.json');
        if (file_exists($jsonPath)) {
            $items = json_decode(file_get_contents($jsonPath), true);
            foreach ($items as $item) {
                PortfolioItem::create([
                    'title' => $item['title'],
                    'category' => $item['category'],
                    'image_path' => $item['image_path'],
                    'video_id' => $item['video_id'],
                    'video_type' => $item['video_type'],
                    'order' => $item['order'],
                ]);
            }
        }
    }
}
