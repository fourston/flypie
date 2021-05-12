<?php
namespace App;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    
    public function run()
    {
        // Удалим имеющиеся в таблице данные
        Category::truncate();

        $faker = \Faker\Factory::create();

        // А теперь давайте создадим 50 статей в нашей таблице
        for ($i = 0; $i < 50; $i++) {
            Category::create([
                'title' => $faker->sentence,
            ]);
        }
    }
}
