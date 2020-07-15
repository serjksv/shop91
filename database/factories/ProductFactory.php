<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $name = $faker->words(1, true);
    return [
        'name'=> $name,
        'slug'=> Str::slug($name, '-'),
        'img' => 'https://loremflickr.com/320/240',
        'price' => $faker->numberBetween($min = 1000, $max = 9000),
        'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'recommended' => $faker->numberBetween(0,1),
        'category_id' => $faker->numberBetween(1, 3),
    ];
});

//php  artisan make:migration create_categories_table (создаю миграционный файл таблицы "таблица пишется во множественном числе (categories)")
//php artisan migrate:refresh --seed 
// php artisan db:seed
// php artisan migrate
//php artisan migrate:rollback (откатывает назад последнюю миграцию)
//php artisan make:model Category (созд модель таблицы "пишется в единственном числе")
//php artisan make:factory CategoryFactory 
//php artisan make:model Product -mf (создает модель, миграционный файл и фабрику )