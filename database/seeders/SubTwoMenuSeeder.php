<?php

namespace Database\Seeders;

use App\Models\SubOneMenu;
use App\Models\SubTwoMenu;
use Illuminate\Database\Seeder;

class SubTwoMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subTwoMenus = [
            [
                'sub_one_menu_id' => 1,
                'name_az' => 'Akril Panel',
                'name_en' => 'Acrylic Panel',
                'name_ru' => 'Акриловая панель',
                'slug_az' => str_slug('Akril Panel'),
                'slug_en' => str_slug('Acrylic Panel'),
                'slug_ru' => str_slug('Акриловая панель')
            ],
            [
                'sub_one_menu_id' => 1,
                'name_az' => 'Çizilməz Akril Panel',
                'name_en' => 'Scratch Acrylic Panel',
                'name_ru' => 'Акриловая панель для царапин',
                'slug_az' => str_slug('Çizilməz Akril Panel'),
                'slug_en' => str_slug('Scratch Acrylic Panel'),
                'slug_ru' => str_slug('Акриловая панель для царапин')
            ]
        ];

        foreach ($subTwoMenus as $subTwoMenu) {
            SubTwoMenu::create([
                'sub_one_menu_id' => $subTwoMenu['sub_one_menu_id'],
                'name_az' => $subTwoMenu['name_az'],
                'name_en' => $subTwoMenu['name_en'],
                'name_ru' => $subTwoMenu['name_ru'],
                'slug_az' => $subTwoMenu['slug_az'],
                'slug_en' => $subTwoMenu['slug_en'],
                'slug_ru' => $subTwoMenu['slug_ru']
            ]);
        }
    }
}
