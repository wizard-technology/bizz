<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\Tag;
use App\Models\Type;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

// $factory->define(User::class, function (Faker $faker) {
//     return [
//         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//         'u_first_name' =>  $faker->name,
//         'u_second_name' =>  $faker->name,
//         'u_phone' => $faker->unique()->numberBetween($min = 10000000000, $max = 99999999999),
//         'u_email' =>  $faker->unique()->safeEmail,
//         'u_state' =>  1,
//         // 'u_role' =>  'ADMIN',        
//         'u_phone_verified_at' => now()
//     ];
// });
$factory->define(Type::class, function (Faker $faker) {
    return [
        't_name' => 'Cart',
        't_name_ku' =>  'کۆڕەک',
        't_state' =>  1,
        't_admin' => 1,
    ];
});
$factory->define(Tag::class, function (Faker $faker) {
    return [
        'tg_name' => $faker->firstNameMale,
        'tg_name_ku' =>  'تاگ',
        'tg_state' =>  1,
        'tg_admin' => 1,
    ];
});
$factory->define(Product::class, function (Faker $faker) {
    return [
        'p_name' => $faker->firstNameMale,
        'p_name_ku' =>  'ناو',
        'p_image' =>  '/uploads/07302020155018Hf5NOIHeQRDOSyVw5nG1qD9OYDvMwuV25f22ec3ae8f23.png',
        'p_price' =>  $faker->numberBetween($min = 5, $max = 100),
        'p_info' =>  $faker->text,
        'p_info_ku' =>  'کوردی',
        'p_state' =>  1,
        'p_type' =>  1,
        'p_admin' => 1,
    ];
});

