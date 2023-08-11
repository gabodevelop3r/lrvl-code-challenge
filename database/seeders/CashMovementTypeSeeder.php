<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CashMovementTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $arrCashMovementType = ( array )

        $arrCashMovementType = [
                        [
                            'name' => 'Ingreso',
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                        ],
                        [
                            'name' => 'Egreso',
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                        ]
                    ];

        DB::table('cash_movement_types')->insert( $arrCashMovementType );
    }
}
