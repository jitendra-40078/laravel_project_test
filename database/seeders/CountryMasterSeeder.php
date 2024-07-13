<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountryMasterSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $masterCountries = DB::table('master_country')
                        ->select('name', 'translations')
                        ->get();

    foreach ($masterCountries as $masterCountry) {
      $translations = json_decode($masterCountry->translations, true);

      Country::create([
        'nameEn' => $masterCountry->name,
        'nameKr' => $translations['kr'],
        'status' => 'A',
        'admin_id' => 1,
      ]);
    }
  }
}

// php artisan db:seed --class=CountryMasterSeeder