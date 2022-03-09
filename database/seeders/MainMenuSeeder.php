<?php

namespace Database\Seeders;

use App\Models\MainMenu;
use Illuminate\Database\Seeder;

class MainMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $main_categories = [
            [
                'name_az'=>'Mebel materialları',
                'name_en'=>'Furniture materials',
                'name_ru'=>'Мебельные материалы'
            ],
            [
                'name_az'=>'Mebel mexanizim və aksesuarları',
                'name_en'=>'Furniture mechanism and accessories',
                'name_ru'=>'Мебельный механизм и фурнитура'
            ],
            [
                'name_az'=>'Təmir və dekorasiya',
                'name_en'=>'Repair and decoration',
                'name_ru'=>'Ремонт и отделка'
            ],
            [
                'name_az'=>'Qida',
                'name_en'=>'Food',
                'name_ru'=>'Еда'
            ]
        ];

        foreach ($main_categories as $main_category)
        {
            MainMenu::create([
                'name_az' => $main_category['name_az'],
                'name_en' => $main_category['name_en'],
                'name_ru' => $main_category['name_ru'],
                'slug_az' => str_slug($main_category['name_az']),
                'slug_en' => str_slug($main_category['name_en']),
                'slug_ru' => str_slug($main_category['name_ru'])
            ]);
        }
    }
}
