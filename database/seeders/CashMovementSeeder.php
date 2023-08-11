<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use App\Models\CashMovement;

class CashMovementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arrCashMovement = ( array )

        $arrCashMovement = [
                        [
                            'cash' => 50,
                            'cash_movement_type_id' => CashMovement::TYPE_INCOME,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                        ],
                        [
                            'cash' => 2000,
                            'cash_movement_type_id' => CashMovement::TYPE_EXPENSES,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                        ],
                        [
                            'cash' => 1500,
                            'cash_movement_type_id' => CashMovement::TYPE_INCOME,
                            'created_at' => Carbon::now()->subMonth(4),
                            'updated_at' => Carbon::now()->subMonth(4),
                        ],
                        [
                            'cash' => 20,
                            'cash_movement_type_id' => CashMovement::TYPE_EXPENSES,
                            'created_at' => Carbon::now()->subMonth(5),
                            'updated_at' => Carbon::now()->subMonth(5),
                        ],
                        [
                            'cash' => 351,
                            'cash_movement_type_id' => CashMovement::TYPE_EXPENSES,
                            'created_at' => Carbon::now()->subMonth(4),
                            'updated_at' => Carbon::now()->subMonth(4),
                        ]

                    ];

        CashMovement::insert( $arrCashMovement );
    }
}
