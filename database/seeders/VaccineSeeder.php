<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VaccineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vaccines')->insert([
            'name'=>'Bananovid',
            'description'=>'Bananovid to południowoamerykańska szczepionka na otyłość.',
            'contraindications'=>'brak apetytu, zapadnięte oczy, bezsenność',
        ]);

        DB::table('vaccines')->insert([
            'name'=>'Miglanc',
            'description'=>'Miglanc to wyrób polskiego producenta.',
            'contraindications'=>'otyłość, ciąża, starość, nadkwasota',
        ]);

        DB::table('vaccines')->insert([
            'name'=>'Podatkojec',
            'description'=>'Rosyjska duma narodowa w szklanym opakowaniu.',
            'contraindications'=>'Uprzednie uzależnienie od substancji psychoaktywnych.',
        ]);

    }
}
