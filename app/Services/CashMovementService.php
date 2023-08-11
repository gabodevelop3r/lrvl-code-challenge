<?php

namespace App\Services;

use Illuminate\Http\Request;

# Models
use App\Models\CashMovement;

# libraries
use Carbon\Carbon;

# resources
use App\Http\Resources\CashResource;

use function PHPUnit\Framework\isNull;

class CashMovementService {

    public function index( Request $request )
    {
        $date = Carbon::parse($request->date);

        return CashResource::collection( CashMovement::with('type')->allCashMovementsByDate($date)->get() );

    }

    /**
     *
     * Obtener total de ingresos
     *
     * @return Int
     */

    public function income( Carbon $date = null ) : Int
    {
        return CashMovement::incomeByDate( $date )->sum('cash');
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

        return CashMovement::expensesByDate( $date )->sum('cash');

     }

     /**
      *  Validar Busqueda de gastos por mes
      *   @param string $dateArg
      *   @return array
      */
     public function getMonthyExpenses( $dateArg = null ) : array
     {


        if( is_null( $dateArg ) ):

            $date = Carbon::now();
            $monthlyExpenses = $this->monthlyExpenses();
            $month = $date->copy()->monthName;

        else:

            $date = Carbon::parse($dateArg);
            $monthlyExpenses = $this->monthlyExpenses( $date );
            $month = $date->monthName;
        endif;

        return [
            $monthlyExpenses,
            $month,
            CashMovement::AllCashMovementsByDate($date)->orderByDesc('id')->get()
        ];

     }
     /**
      * Obtener total de gastos del mes
      * @param Carbon $date
      * @return Int
      */

    public function monthlyExpenses( Carbon $date = null ) : int
    {

        $income = $this->income( $date );
        $expenses = $this->expenses( $date );

        return $income - $expenses;

    }

    /**
     * Almacenar movimiento de gastos
     * @param Request $request
     * @return Void
     *
     *
     */


    public function storeMovement( Request $request ) : void
    {

        CashMovement::create([
                    'cash' => $request->cash,
                    'cash_movement_type_id' => $request->type,
        ]);

    }


}



