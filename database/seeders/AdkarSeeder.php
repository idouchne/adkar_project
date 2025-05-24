<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdkarSeeder extends Seeder
{
    public function run()
    {
        $adkar = [
            ['text' => 'سبحان الله وبحمده، سبحان الله العظيم', 'source' => 'متفق عليه', 'repeat' => 100, 'category' => 'أذكار الصباح', 'created_at' => now(), 'updated_at' => now()],
            ['text' => 'اللهم بك أصبحنا وبك أمسينا وبك نحيا وبك نموت وإليك النشور', 'source' => 'أذكار الصباح', 'repeat' => 1, 'category' => 'أذكار الصباح', 'created_at' => now(), 'updated_at' => now()],
            ['text' => 'أستغفر الله العظيم الذي لا إله إلا هو الحي القيوم وأتوب إليه', 'source' => 'الترمذي', 'repeat' => 3, 'category' => 'الاستغفار', 'created_at' => now(), 'updated_at' => now()],
            ['text' => 'اللهم إني أسألك العفو والعافية في الدنيا والآخرة', 'source' => 'أذكار المساء', 'repeat' => 1, 'category' => 'أذكار المساء', 'created_at' => now(), 'updated_at' => now()],
            ['text' => 'رضيت بالله رباً، وبالإسلام ديناً، وبمحمد صلى الله عليه وسلم نبياً', 'source' => 'أذكار الصباح', 'repeat' => 3, 'category' => 'أذكار الصباح', 'created_at' => now(), 'updated_at' => now()],
            ['text' => 'اللهم اجعلني من التوابين واجعلني من المتطهرين', 'source' => 'أذكار المساء', 'repeat' => 1, 'category' => 'أذكار المساء', 'created_at' => now(), 'updated_at' => now()],
            ['text' => 'اللهم أنت ربي لا إله إلا أنت، خلقتني وأنا عبدك', 'source' => 'متفق عليه', 'repeat' => 1, 'category' => 'أذكار الصباح', 'created_at' => now(), 'updated_at' => now()],
            ['text' => 'اللهم إني أعوذ بك من شر ما عملت ومن شر ما لم أعمل', 'source' => 'مسلم', 'repeat' => 1, 'category' => 'أذكار المساء', 'created_at' => now(), 'updated_at' => now()],
            ['text' => 'اللهم إني أسألك خير ما في هذه الليلة وخير ما بعدها وأعوذ بك من شرها وشر ما بعدها', 'source' => 'أذكار المساء', 'repeat' => 1, 'category' => 'أذكار المساء', 'created_at' => now(), 'updated_at' => now()],

            ['text' => 'لا إله إلا الله وحده لا شريك له، له الملك وله الحمد وهو على كل شيء قدير', 'source' => 'متفق عليه', 'repeat' => 100, 'category' => 'أذكار الصباح', 'created_at' => now(), 'updated_at' => now()],
            ['text' => 'اللهم صل على محمد وعلى آل محمد كما صليت على إبراهيم وعلى آل إبراهيم إنك حميد مجيد', 'source' => 'مسلم', 'repeat' => 10, 'category' => 'الصلاة على النبي', 'created_at' => now(), 'updated_at' => now()],
            ['text' => 'أعوذ بكلمات الله التامات من شر ما خلق', 'source' => 'البخاري', 'repeat' => 3, 'category' => 'الرقية الشرعية', 'created_at' => now(), 'updated_at' => now()],
            ['text' => 'رضيت بالله رباً وبالإسلام ديناً وبمحمد نبياً', 'source' => 'متفق عليه', 'repeat' => 3, 'category' => 'أذكار الصباح', 'created_at' => now(), 'updated_at' => now()],
            ['text' => 'أعوذ بكلمات الله التامات من شر ما خلق', 'source' => 'البخاري', 'repeat' => 3, 'category' => 'أذكار المساء', 'created_at' => now(), 'updated_at' => now()],

            ['text' => 'سبحان الله، والحمد لله، ولا إله إلا الله، والله أكبر', 'source' => 'متفق عليه', 'repeat' => 33, 'category' => 'أذكار', 'created_at' => now(), 'updated_at' => now()],
            ['text' => 'لا حول ولا قوة إلا بالله', 'source' => 'متفق عليه', 'repeat' => 100, 'category' => 'أذكار', 'created_at' => now(), 'updated_at' => now()],
            ['text' => 'اللهم صل وسلم على نبينا محمد', 'source' => 'متفق عليه', 'repeat' => 10, 'category' => 'الصلاة على النبي', 'created_at' => now(), 'updated_at' => now()],

            ['text' => 'اللهم اجعلني من الذين يذكرونك كثيراً', 'source' => 'متفق عليه', 'repeat' => 100, 'category' => 'ذكر', 'created_at' => now(), 'updated_at' => now()],
            ['text' => 'لا إله إلا الله وحده لا شريك له، له الملك وله الحمد وهو على كل شيء قدير', 'source' => 'متفق عليه', 'repeat' => 100, 'category' => 'ذكر', 'created_at' => now(), 'updated_at' => now()],
            ['text' => 'اللهم اجعلني من الذين يستمعون القول فيتبعون أحسنه', 'source' => 'متفق عليه', 'repeat' => 3, 'category' => 'ذكر', 'created_at' => now(), 'updated_at' => now()],

            ['text' => 'اللهم اجعلني من الذين يحبون القران ويعملون به', 'source' => 'متفق عليه', 'repeat' => 3, 'category' => 'ذكر', 'created_at' => now(), 'updated_at' => now()],
            ['text' => 'سبحان الله وبحمده، سبحان الله العظيم', 'source' => 'متفق عليه', 'repeat' => 100, 'category' => 'ذكر', 'created_at' => now(), 'updated_at' => now()],

            ['text' => 'لا إله إلا الله، محمد رسول الله', 'source' => 'متفق عليه', 'repeat' => 100, 'category' => 'ذكر', 'created_at' => now(), 'updated_at' => now()],
            ['text' => 'سبحان الله والحمد لله ولا إله إلا الله والله أكبر', 'source' => 'متفق عليه', 'repeat' => 100, 'category' => 'ذكر', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('adkar')->insert($adkar);
    }
}
