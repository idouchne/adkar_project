<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dua;


class DuaSeeder extends Seeder
{
    public function run()
    {
        Dua::create([
            'title' => 'دعاء الصباح',
            'dua' => 'اللهم بك أصبحنا وبك أمسينا...',
            'source' => 'صحيح مسلم',
            'translation' => 'Oh Allah, with Your blessing we wake up and go to sleep...',
            'category' => 'الصباح'
        ]);

        Dua::create([
            'title' => 'دعاء النوم',
            'dua' => 'باسمك اللهم أموت وأحيا...',
            'source' => 'صحيح البخاري',
            'translation' => 'In Your name, O Allah, I live and die...',
            'category' => 'النوم'
        ]);
    }
}
