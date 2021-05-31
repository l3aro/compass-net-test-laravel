<?php

namespace App\Http\Controllers;

use Faker\Factory;

class TestController extends Controller
{
    public function __invoke()
    {
        $sellers = $this->loadSeller();
        dump([
            'seller' => $sellers->pluck('name')->implode(', '),
            'array' => $sellers->toArray(),
            'json' => $sellers->toJson(),
        ]);

        $buyers = $this->loadBuyer();
        dump([
            'array' => $buyers->toArray(),
            'json' => $buyers->toJson(),
        ]);
    }

    public function loadSeller()
    {
        $faker = Factory::create();
        return collect(range(1, 5))
            ->map(function () use ($faker) {
                $item = collect();
                $item['name']  = $faker->name;
                $item['website'] = $faker->url;
                $item['email'] = $faker->email;
                return $item;
            });
    }

    public function loadBuyer()
    {
        $faker = Factory::create();
        return collect(range(1, 5))
            ->map(function () use ($faker) {
                $item = collect();
                $item['firstName']  = $faker->firstName();
                $item['lastName'] = $faker->lastName();
                $item['email'] = $faker->email;
                $item['phone'] = $faker->phoneNumber;
                return $item;
            });
    }
}
