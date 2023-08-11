<?php

namespace App\Services;

use Illuminate\Http\Request;

use App\Models\Box;

use Carbon\Carbon;

use App\Http\Resources\BoxResource;

use App\Actions\MonthRangeAction;

class BoxService {

    public function index()
    {
        $box = BoxResource::collection( Box::with('type')->get() );
        return response()->json([
            'box'=> $box
        ]);
    }

    /**
     *
     * Obtener total de ingresos
     *
     * @return Int
     */

    public function income( Carbon $date = null ) : Int
    {
        return Box::incomeByDate( $date )->sum('cash');
    }

    /**
     *
     * Obtener total de egresos
     *
     * @return Int
     *
     */

     public function expenses( Carbon $date = null ) : Int
     {

        return Box::expensesByDate( $date )->sum('cash');

     }

     /**
      * Obtener total de gastos del mes
      *
      */

    public function monthlyExpenses(  $date = null )
    {

        $income = $this->income( $date );
        $expenses = $this->expenses( $date );

        return $income - $expenses;

    }


}



