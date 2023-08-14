<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use \Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

# form request
use App\Http\Requests\MovementRequest;
use App\Http\Requests\StoreMovementRequest;
use App\Models\CashMovement;
#services
use App\Services\CashMovementService;
# libraries
use Carbon\Carbon;

class CashMovementController extends Controller
{

    private $cashMovementService;

    public function __construct()
    {
        $this->cashMovementService = new CashMovementService();
    }
    /**
     * Lista de movientos de la caja
     * @param MovementRequest $request
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

    /**
     *
     * Actualizar gastos del mes
     *  @param StoreMovementRequest $request
     *  @return JsonResponse
     *
     */
    public function update(StoreMovementRequest $request) : JsonResponse
    {
        $movement = CashMovement::firstOrFail($request->id);

        $movement->update($request->all());

        return response()->json([
            'message' => 'Movimiento actualizado correctamente'
          ], 201);

    }

    /**
     *
     * Eliminar gasto
     *  @param Request $request
     *  @return JsonResponse
     */
    public function destroy(Request $request) : JsonResponse
    {

        CashMovement::destroy($request->id);

        return response()->json([
           'message' => 'Movimiento eliminado correctamente'
          ], 201);
    }

}
