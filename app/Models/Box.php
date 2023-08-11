<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;

# Actions
use App\Actions\MonthRangeAction;

class Box extends Model
{
    use HasFactory;


    public const TYPE_INCOME = 1;
    public const TYPE_EXPENSES = 2;

    protected $fillable = [
        'cash'
    ];


    /**
     *
     * Relationshipa
     *
     *
     */

    public function type() : BelongsTo
    {
        return $this->belongsTo(BoxType::class, 'box_type_id', 'id');
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

        $query->whereBoxTypeId( self::TYPE_INCOME )
                ->whereBetween('created_at', [ $startOfMonth, $endOfMonth ] ) ;

    }

    public function scopeExpensesByDate( $query, Carbon $month = NULL ) : void
    {

        $monthRangeAction = new MonthRangeAction( );

        list( $startOfMonth, $endOfMonth ) = $monthRangeAction->handle( $month );

        $query->whereBoxTypeId( self::TYPE_EXPENSES )
                ->whereBetween('created_at', [ $startOfMonth, $endOfMonth ] ) ;

    }










}
