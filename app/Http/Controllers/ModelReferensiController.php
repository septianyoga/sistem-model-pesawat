<?php

namespace App\Http\Controllers;

use App\Models\TRPGMMODEL;
use Illuminate\Http\Request;

class ModelReferensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return TRPGMMODEL::with(['trpgm', 'trpgmsub', 'trpon'])->get();
        return view('ditek.model_referensi.index', [
            'title' => 'Kelola Model Referensi',
            'models'    => TRPGMMODEL::all()
        ]);
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
    public function show(TRPGMMODEL $tRPGMMODEL)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TRPGMMODEL $tRPGMMODEL)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TRPGMMODEL $tRPGMMODEL)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TRPGMMODEL $tRPGMMODEL)
    {
        //
    }
}
