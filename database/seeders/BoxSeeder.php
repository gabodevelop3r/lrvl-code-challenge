<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

use App\Models\Box;

class BoxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arrBox = ( array )

        $arrBox = [
                        [
                            'cash' => 50,
                            'box_type_id' => Box::TYPE_INCOME,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                        ],
                        [
                            'cash' => 2000,
                            'box_type_id' => Box::TYPE_EXPENSES,
                            'created_at' => date('Y-m-d H:i:s'),
                            'updated_at' => date('Y-m-d H:i:s'),
                        ],
                        [
                            'cash' => 1500,
                            'box_type_id' => Box::TYPE_INCOME,
                            'created_at' => Carbon::now()->subMonth(4),
                            'updated_at' => Carbon::now()->subMonth(4),
                        ],
                        [
                            'cash' => 20,
                            'box_type_id' => Box::TYPE_EXPENSES,
                            'created_at' => Carbon::now()->subMonth(5),
                            'updated_at' => Carbon::now()->subMonth(5),
                        ],
                        [
                            'cash' => 351,
                            'box_type_id' => Box::TYPE_EXPENSES,
                            'created_at' => Carbon::now()->subMonth(4),
                            'updated_at' => Carbon::now()->subMonth(4),
                        ],

                    ];

        DB::table('boxes')->insert( $arrBox );
    }
}
