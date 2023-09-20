<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Specialization;
use App\Models\Status;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
       DB::table('specializations')->insert([
            ['name'=>'Информационные системы и программирование',
             'url'=>'https://bgpk.edu22.info/абитуриенту/специальности/1242-09-02-07'],
            ['name'=>'Правоохранительная деятельность',
            'url'=>'https://bgpk.edu22.info/абитуриенту/специальности/1158-40-02-02'],
            ['name'=>'Дошкольное образование',
            'url'=>'https://bgpk.edu22.info/абитуриенту/специальности/1148-44-02-01'],
            ['name'=>'Преподавание в начальных классах',
            'url'=>'https://bgpk.edu22.info/абитуриенту/специальности/1153-44-02-02'],
            ['name'=>'Специальное дошкольное образование',
            'url'=>'https://bgpk.edu22.info/абитуриенту/специальности/1149-44-02-04'],
            ['name'=>'Коррекционная педагогика в начальном образовании',
            'url'=>'https://bgpk.edu22.info/абитуриенту/специальности/1151-44-02-05'],
            ['name'=>'Физическая культура',
            'url'=>'https://bgpk.edu22.info/абитуриенту/специальности/1156-49-02-01'],
            ['name'=>'Адаптивная физическая культура',
            'url'=>'https://bgpk.edu22.info/абитуриенту/специальности/1147-49-02-02'],
            ['name'=>'Музыкальное образование',
            'url'=>'https://bgpk.edu22.info/абитуриенту/специальности/1152-53-02-01'],
            ['name'=>'Изобразительное искусство и черчение',
            'url'=>'https://bgpk.edu22.info/абитуриенту/специальности/1150-54-02-06'],
            
        ]);
        Status::insert([
         ['name'=>'В обработке'],
         ['name'=>'Принято'],
         ['name'=>'Отказано'],
        ]);
    }
}
