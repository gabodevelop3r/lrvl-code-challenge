<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use \Illuminate\Http\JsonResponse;

# form request
use App\Http\Requests\MovementRequest;
use App\Http\Requests\StoreMovementRequest;

#services
use App\Services\CashMovementService;
# libraries
use Carbon\Carbon;

class CashMovementController extends Controller
{

    private $cashMovementService ;

    public function __construct()
    {
        $this->cashMovementService = new CashMovementService();
    }
    /**
     * Lista de movientos de la caja
     * @param MovementRequest $request
     *
     * @return JsonResponse
     *
     */
    public function index( MovementRequest $request ) : JsonResponse
    {
        $cashMovement = $this->cashMovementService->index($request);
         return response()->json([
            'cash_movement'=> $cashMovement
        ]);
    }


    /**
     *
     * Obtener total de gastos del mes
     *  @param MovementRequest $request
     *  @return int
     *
     *
     */
    public function byMonth(MovementRequest $request) : int
    {

        $date = Carbon::parse($request->date);

        return $this->cashMovementService->monthlyExpenses( $date );
    }


    /**
     * Almacenar gastos del mes
     * @param StoreMovementRequest $request
     * @return JsonResponse
     */
    public function store(StoreMovementRequest $request) : JsonResponse
    {
        $this->cashMovementService->storeMovement($request);

        return response()->json([
              'message' => 'Movimiento guardado correctamente'
            ], 201);

    }

}
