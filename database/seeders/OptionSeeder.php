<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $options = [
            [
                'key'=>'unvan',
                'value'=>'Ünvan***Address***адрес',
            ],
            [
                'key'=>'tel',
                'value'=>'+994 12 598 83 19***+994125988319',
            ],
            [
                'key'=>'email',
                'value'=>'example@gmail.com'
            ],
            [
                'key'=>'facebook',
                'value'=>'https://www.facebook.com/example'
            ],
            [
                'key'=>'instagram',
                'value'=>'https://www.instagram.com/example'
            ],
            [
                'key'=>'youtube',
                'value'=>'https://www.youtube.com/example'
            ]
        ];

        foreach ($options as $option) {
            Option::create($option);
        }
    }
}
