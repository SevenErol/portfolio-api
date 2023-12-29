<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = ['Java', 'Tailwind', 'C', 'C++', 'C#', 'Python'];

        foreach ($languages as $language) {
            $newlanguage = new Language();
            $newlanguage->lang_name = $language;
            $newlanguage->save();
        }
    }
}
