<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Zekr;

class ZekrSeeder extends Seeder
{
    public function run()
    {
        $azkar = [
            ['zekr' => 'سبحان الله', 'repeat' => 33, 'category' => 'تسبيح'],
            ['zekr' => 'الحمد لله', 'repeat' => 33, 'category' => 'تحميد'],
            ['zekr' => 'الله أكبر', 'repeat' => 34, 'category' => 'تكبير'],
        ];

        foreach ($azkar as $item) {
            Zekr::create($item);
        }
    }
}
