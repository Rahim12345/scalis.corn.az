<?php

namespace Database\Seeders;

use App\Models\MainMenu;
use App\Models\SubOneMenu;
use Illuminate\Database\Seeder;

class SubOneMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub_one_menus = [
            [
                'main_menu_id' => 1,
                'name_az' => 'MDF',
                'name_en' => 'MDF',
                'name_ru' => 'MDF',
                'slug_az' =>str_slug('MDF'),
                'slug_en' =>str_slug('MDF'),
                'slug_ru' =>str_slug('MDF')
            ],
            [
                'main_menu_id' => 1,
                'name_az' => 'Lam',
                'name_en' => 'Lam',
                'name_ru' => 'Lam',
                'slug_az' =>str_slug('Lam'),
                'slug_en' =>str_slug('Lam'),
                'slug_ru' =>str_slug('Lam')
            ],
            [
                'main_menu_id' => 1,
                'name_az' => 'Panel',
                'name_en' => 'Panel',
                'name_ru' => 'Панель',
                'slug_az' =>str_slug('Panel'),
                'slug_en' =>str_slug('Panel'),
                'slug_ru' =>str_slug('Панель')
            ],
            [
                'main_menu_id' => 1,
                'name_az' => 'Profil',
                'name_en' => 'Profile',
                'name_ru' => 'Профиль',
                'slug_az' =>str_slug('Profil'),
                'slug_en' =>str_slug('Profile'),
                'slug_ru' =>str_slug('Профиль')
            ],
            [
                'main_menu_id' => 1,
                'name_az' => 'Yonqar',
                'name_en' => 'Shavings',
                'name_ru' => 'Йонкар',
                'slug_az' =>str_slug('Yonqar'),
                'slug_en' =>str_slug('Shavings'),
                'slug_ru' =>str_slug('Йонкар')
            ]
        ];

        foreach ($sub_one_menus as $sub_one_menu) {
            SubOneMenu::create([
                'main_menu_id' => $sub_one_menu['main_menu_id'],
                'name_az' => $sub_one_menu['name_az'],
                'name_en' => $sub_one_menu['name_en'],
                'name_ru' => $sub_one_menu['name_ru'],
                'slug_az' => $sub_one_menu['slug_az'],
                'slug_en' => $sub_one_menu['slug_en'],
                'slug_ru' => $sub_one_menu['slug_ru']
            ]);
        }
    }
}
