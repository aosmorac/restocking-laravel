<?php

use Faker\Generator as Faker;

$factory->define(App\Rlist::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body'  => $faker->paragraph
    ];
});

$factory->define(App\Item::class, function (Faker $faker) {
    return [
        'list_id' => function () {
            return factory('App\Rlist')->create()->id;
        },
        'name' => $faker->sentence,
        'description'  => $faker->paragraph
    ];
});

//$lists = factory('App\Rlist', 50)->create();
//$lists->each(function($list){$items = factory('App\Item', 10)->create(['list_id' => $list->id]); });
