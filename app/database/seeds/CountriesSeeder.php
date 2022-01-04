<?php
namespace App\Database\Seeds;

use App\Models\Country;
use App\Database\Factories\CountryFactory;
use Illuminate\Database\Seeder;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // You can directly create db records

        $country = new Country();
        $country->country = 'China';
        $country->country_flag_path = 'china_flag.png';
        $country->save();

        $country = new Country();
        $country->country = 'DPRK';
        $country->country_flag_path = 'DPRK_flag.png';
        $country->save();

        $country = new Country();
        $country->country = 'Russia';
        $country->country_flag_path = 'russsia_flag.png';
        $country->save();
    }
}