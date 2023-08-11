<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

# Actions
use App\Actions\MonthRangeAction;

class CashMovement extends Model
{
    use HasFactory;

    public const TYPE_INCOME = 1;
    public const TYPE_EXPENSES = 2;

    protected $fillable = [
        'cash',
        'cash_movement_type_id'
    ];


    /**
     *
     * Relationshipa
     *
     *
     */

     public function type() : BelongsTo
     {
         return $this->belongsTo(CashMovementType::class, 'cash_movement_type_id', 'id');
     }


     /***
      *
      * SECCION DE SCOPES
      *
      *
      */

     public function scopeIncomeByDate( $query , Carbon $month = null ) : void
     {
         $monthRangeAction = new MonthRangeAction( );

         list( $startOfMonth, $endOfMonth ) = $monthRangeAction->handle( $month );

         $query->whereCashMovementTypeId( self::TYPE_INCOME )
                 ->whereBetween('created_at', [ $startOfMonth, $endOfMonth ] ) ;

     }

     public function scopeExpensesByDate( $query, Carbon $month = NULL ) : void
     {

         $monthRangeAction = new MonthRangeAction( );

         list( $startOfMonth, $endOfMonth ) = $monthRangeAction->handle( $month );

         $query->whereCashMovementTypeId( self::TYPE_EXPENSES )
                 ->whereBetween('created_at', [ $startOfMonth, $endOfMonth ] ) ;

     }

     /**
      *
      *
      *
      */
     public function scopeAllCashMovementsByDate( $query, Carbon $month = NULL ) : void
     {

        $monthRangeAction = new MonthRangeAction( );

        list( $startOfMonth, $endOfMonth ) = $monthRangeAction->handle( $month );

        $query->whereBetween('created_at', [ $startOfMonth, $endOfMonth  ]);

     }


}
