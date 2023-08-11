<?php

namespace App\Actions;

use Carbon\Carbon;

class MonthRangeAction {

    public function handle( Carbon $month = null ): array
    {
        return $this->monthRange( $month );
    }

    /***
     *
     * Obtener rango de mes por fecha
     *
     * @param $month Carbon|null
     * @return array
     *
     */

    private function monthRange( Carbon $month = null ) : array
    {
        if( $month ):

            $startOfMonth = $month->copy()->startOfMonth();
            $finishOfMonth = $month->copy()->endOfMonth();
        else:

            $startOfMonth = Carbon::now()->startOfMonth();
            $finishOfMonth = Carbon::now()->endOfMonth();

        endif;

        return [
            $startOfMonth->toDateString(),
            $finishOfMonth->toDateString(),
        ];

    }

}


