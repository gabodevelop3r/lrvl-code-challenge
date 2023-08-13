<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

# libraries
use Carbon\Carbon;

# requests
use App\http\Requests\{
        StoreMovementRequest,
        MovementRequest
    };

# Services
use App\Services\CashMovementService;

# models
use App\Models\{
        CashMovement,
        CashMovementType
    };

class CashMovementController extends Controller
{

    private $cashMovementService;

    public function __construct()
    {
        $this->cashMovementService = new CashMovementService();
    }
    /**
     * Obtener gastos del mes , mes consultado y lista de movimientos.
     * @param string $dateArg
     * @return View
     */
    public function index( $dateArg = null)
    {

        list( $monthlyExpenses, $month, $movements ) = $this->cashMovementService->getMonthyExpenses( $dateArg );

        return view('home', [ 'monthlyExpenses' => $monthlyExpenses, 'month' => $month , 'movements'  => $movements ] );
    }


    /**
     * Almacenar movimientos
     * @param StoreMovementRequest  $request
     * @return RedirectResponse
     */
    public function store( StoreMovementRequest $request ) : RedirectResponse
    {
        $this->cashMovementService->storeMovement( $request );

        return redirect()->route('transactions')->with('success', 'Movimento Guardado!' );
    }

    /**
     *
     * Transaccion de movimientos
     * @return View
     *
     *
     */
    public function transactions() : View
    {

        return view('transactions.index');

    }

    /**
     *
     *
     * Editar transaccion de movimientos
     *
     *
     */
    public function edit( CashMovement $movement ) : View
    {
        $movementTypes = CashMovementType::all();
        return view('transactions.edit' , [ 'movement' => $movement, 'movementTypes' => $movementTypes ]);
    }
    /**
     *
     *  Actualizar transaccion de movimientos
     *
     *
     */
    public function update( CashMovement $movement ,StoreMovementRequest $request  ) : RedirectResponse
    {

        $movement->update( $request->all() );
        return to_route('home')->with('success', 'Movimento Guardado!' );

    }

     /**
     *
     * Consultar movimientos por mes
     * @param $request Request
     * @return RedirectResponse
     *
     */
    public function byMonth( MovementRequest $request ) : RedirectResponse
    {

        $date = Carbon::parse($request->date);;

        return to_route( 'home', ['date' => $date ] );
    }

    public function destroy( $id ) {
        CashMovement::destroy($id);
        return to_route('home');
    }

}
