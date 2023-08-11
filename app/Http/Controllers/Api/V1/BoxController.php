<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BoxService;
use App\Http\Requests\MovementRequest;
use Carbon\Carbon;


class BoxController extends Controller
{

    private $boxService ;

    public function __construct()
    {
        $this->boxService = new BoxService();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return $this->boxService->index();
    }

    /**
     *
     *
     *
     *
     */
    public function byMonth(MovementRequest $request){

        $date = Carbon::parse($request->date);


        return $this->boxService->monthlyExpenses( $date );
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
