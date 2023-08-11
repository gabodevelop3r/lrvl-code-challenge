<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

# Services
use App\Services\BoxService;



class BoxController extends Controller
{
    private $boxService;

    public function __construct()
    {
        $this->boxService = new BoxService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $monthlyExpenses = $this->boxService->monthlyExpenses();

        return view('home', [ 'monthlyExpenses' => $monthlyExpenses ] );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
