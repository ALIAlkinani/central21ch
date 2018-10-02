<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
  
});
$factory->define(App\Poet::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'date_of_birth'=>$faker->date,
        'date_of_death'=>$faker->date,
        'nationality'=>'Iraqi',
        'mother_language'=>'Arabic'

        
    ];
  
});
$factory->state(App\User::class, 'administrator', function () {
    return [
        'name' => 'ali'
    ];
});


$factory->define(App\Poem::class, function (Faker $faker) {
    $title = $faker->sentence;
    return [
        'user_id' => function(){
            return factory('App\User')->create()->id;
        },
        'channel_id' => function(){
            return factory('App\Channel')->create()->id;
        },
        'lat'=>-33.865143,
        'lng'=>151.2099,
        'title' => $title,
        'body'=>$faker->paragraph,
        'visits' => 0,
        'slug' => str_slug($title),
        'locked' => false,
    ];
});

$factory->define(App\Reply::class, function (Faker $faker) {
    return [
        'user_id' => function(){
            return factory('App\User')->create()->id;
        },
        'poem_id' => function(){
            return factory('App\Poem')->create()->id;
        },

        
       
        'body'=>$faker->paragraph,

    ];
});
$factory->define(App\Translate::class, function (Faker $faker) {
    return [
        'user_id' => function(){
            return factory('App\User')->create()->id;
        },
        'poem_id' => function(){
            return factory('App\Poem')->create()->id;
        },
        'language'=> $faker->word,
        'body'=>$faker->paragraph,

    ];
});
$factory->define(App\Channel::class, function (Faker $faker) {
  $name= $faker->word;
  
    return [       
       
        'name'=>$name,
        'slug'=>$name,
    ];
});
$factory->define(\Illuminate\Notifications\DatabaseNotification::class, function ($faker) {
    return [
        'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
        'type' => 'App\Notifications\PoemWasUpdated',
        'notifiable_id' => function () {
            return auth()->id() ?: factory('App\User')->create()->id;
        },
        'notifiable_type' => 'App\User',
        'data' => ['foo' => 'bar']
    ];
});