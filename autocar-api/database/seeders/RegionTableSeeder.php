<?php


namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;

class RegionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regions = [
            [
                'name' => 'Amazonas',
                'code' => 'AM',
            ],
            [
                'name' => 'Ancash',
                'code' => 'AN',
            ],
            [
                'name' => 'Apurimac',
                'code' => 'AP',
            ],
            [
                'name' => 'Arequipa',
                'code' => 'AR',
            ],
            [
                'name' => 'Ayacucho',
                'code' => 'AY',
            ],
            [
                'name' => 'Cajamarca',
                'code' => 'CM',
            ],
            [
                'name' => 'Callao',
                'code' => 'CL',
            ],
            [
                'name' => 'Cusco',
                'code' => 'CU',
            ],
            [
                'name' => 'Huancavelica',
                'code' => 'HC',
            ],
            [
                'name' => 'Huanuco',
                'code' => 'HU',
            ],
            [
                'name' => 'Ica',
                'code' => 'IC',
            ],
            [
                'name' => 'Junin',
                'code' => 'JU',
            ],
            [
                'name' => 'La Libertad',
                'code' => 'LL',
            ],
            [
                'name' => 'Lambayeque',
                'code' => 'LA',
            ],
            [
                'name' => 'Lima',
                'code' => 'LI',
            ],
            [
                'name' => 'Loreto',
                'code' => 'LO',
            ],
            [
                'name' => 'Madre de Dios',
                'code' => 'MD',
            ],
            [
                'name' => 'Moquegua',
                'code' => 'MO',
            ],
            [
                'name' => 'Pasco',
                'code' => 'PA',
            ],
            [
                'name' => 'Piura',
                'code' => 'PI',
            ],
            [
                'name' => 'Puno',
                'code' => 'PU',
            ],
            [
                'name' => 'San Martin',
                'code' => 'SM',
            ],
            [
                'name' => 'Tumbes',
                'code' => 'TU',
            ],
            [
                'name' => 'Tacna',
                'code' => 'TA',
            ],
            [
                'name' => 'Ucayali',
                'code' => 'UC',
            ]
        ];

        foreach ($regions as $regionCollections) {
            $region = new Region;
            foreach ($regionCollections as $key => $collection) {
                $region->{$key} = $collection;
            }
            $region->save();
        }
    }
}
