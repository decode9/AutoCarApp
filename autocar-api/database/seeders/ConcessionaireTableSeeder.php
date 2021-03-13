<?php


namespace Database\Seeders;

use App\Models\Concessionaire;
use App\Models\Region;
use Illuminate\Database\Seeder;

class ConcessionaireTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $concessionaire = [
            [
                'name' => 'Amazonas AutoCar',
                'direction' => 'Amazonas Calle 1',
                'code' => 'AC1',
                'region_id' => 1,
            ],
            [
                'name' => 'Ancash AutoCar',
                'direction' => 'Ancash Calle 2',
                'code' => 'AC2',
                'region_id' => 2,
            ],
            [
                'name' => 'Apurimac AutoCar',
                'direction' => 'Apurimac Calle 4',
                'code' => 'AC3',
                'region_id' => 3,
            ],
            [
                'name' => 'Arequipa AutoCar',
                'direction' => 'Arequipa Calle 8',
                'code' => 'AC4',
                'region_id' => 4,
            ],
            [
                'name' => 'Ayacucho AutoCar',
                'direction' => 'Ayacucho Calle 11',
                'code' => 'AC5',
                'region_id' => 5,
            ],
            [
                'name' => 'Cajamarca AutoCar',
                'direction' => 'Cajamarca Calle 17',
                'code' => 'AC6',
                'region_id' => 6,
            ],
            [
                'name' => 'Callao AutoCar',
                'direction' => 'Callao Calle 20',
                'code' => 'AC7',
                'region_id' => 7,
            ],
            [
                'name' => 'Cusco AutoCar',
                'direction' => 'Cusco Calle 80',
                'code' => 'AC8',
                'region_id' => 8,
            ],
            [
                'name' => 'Huancavelica AutoCar',
                'direction' => 'Huancavelica Calle 01',
                'code' => 'AC9',
                'region_id' => 9,
            ],
            [
                'name' => 'Huanuco AutoCar',
                'direction' => 'Huanuco Calle 17',
                'code' => 'AC10',
                'region_id' => 10,
            ],
            [
                'name' => 'Ica Autocar',
                'direction' => 'Ica Calle 74',
                'code' => 'AC11',
                'region_id' => 11,
            ],
            [
                'name' => 'Junin AutoCar',
                'direction' => 'Junin Calle 137',
                'code' => 'AC12',
                'region_id' => 12,
            ],
            [
                'name' => 'La Libertad AutoCar',
                'direction' => 'La Libertad Calle 197',
                'code' => 'AC13',
                'region_id' => 13,
            ],
            [
                'name' => 'Lambayeque AutoCar',
                'direction' => 'Lambayeque Calle 145',
                'code' => 'AC14',
                'region_id' => 14,
            ],
            [
                'name' => 'Lima AutoCar',
                'direction' => 'Lima Calle 17',
                'code' => 'AC15',
                'region_id' => 15,
            ]
        ];

        foreach ($concessionaire as $concessionaireCollections) {
            $concessionaire = new Concessionaire;
            foreach ($concessionaireCollections as $key => $collection) {
                $concessionaire->{$key} = $collection;
            }
            $concessionaire->save();
        }
    }
}
