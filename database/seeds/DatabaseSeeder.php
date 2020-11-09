<?php

use App\City;
use App\Province;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        $prov1 = Province::create([
            'province_name' => 'Jawa Barat'
        ]);
        $prov1->save();

        $prov2 = Province::create([
            'province_name' => 'Jawa Tengah'
        ]);
        $prov2->save();

        $city1 = City::create([
            'city_name' => 'Bandung',
            'province_id' => $prov1->id
        ]);
        $city1->save();

        $city2 = City::create([
            'city_name' => 'Bogor',
            'province_id' => $prov1->id
        ]);
        $city2->save();

        $city3 = City::create([
            'city_name' => 'Bekasi',
            'province_id' => $prov1->id
        ]);
        $city3->save();

        $city4 = City::create([
            'city_name' => 'Depok',
            'province_id' => $prov1->id
        ]);
        $city4->save();

        $city5 = City::create([
            'city_name' => 'Semarang',
            'province_id' => $prov2->id
        ]);
        $city5->save();

        $city6 = City::create([
            'city_name' => 'Surakarta',
            'province_id' => $prov2->id
        ]);
        $city6->save();
    }
}
