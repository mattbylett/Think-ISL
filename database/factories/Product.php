<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
        $products = array(
          'Automotive',
          'Abrasives',
          'Hand Tool',
          'Hardware',
          'Socketry',
          'Paint',
          'Tool Box',
          'WorkShop',
          'Welding',
          'Safety',
        );

        $brands = array(
          'Teng Tools',
          'Koken',
          'Powerbuilt',
          'Makita',
          'Autosol',
          'Stronghand',
          'Buildpro',
          'Hammerite',
          'Sikkens',
          'Kale',
        );

        $suppliers = array(
          'ISL',
          'Hobeca',
          'All Trade',
        );

      $pIndex = $faker->numberBetween(0, count($products) -1);
      $bIndex = $faker->numberBetween(0, count($brands) -1);
      $sIndex = $faker->numberBetween(0, count($suppliers) -1);

      return [
        'code' => $faker->numberBetween(500, 20000),
        'title' => $products[$pIndex],
        'stock' => $faker->numberBetween(0, 100),
        'price' => $faker->numberBetween(0, 10000),
        'brand' => $products[$bIndex],
        'supplier' => $products[$sIndex],

      ];
});
