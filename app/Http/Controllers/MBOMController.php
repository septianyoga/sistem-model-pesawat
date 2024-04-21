<?php

namespace App\Http\Controllers;

use App\Models\MBOM;
use App\Http\Requests\StoreMBOMRequest;
use App\Http\Requests\UpdateMBOMRequest;
use App\Models\TRPGMMODEL;
use RealRashid\SweetAlert\Facades\Alert;

class MBOMController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('ditek.mbom.index', [
            'title' => 'Kelola MBOM',
            'eboms' => MBOM::with('trpgmmodel')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('ditek.mbom.add', [
            'title' => 'Add Data MBOM',
            'trpgmmodel'    => TRPGMMODEL::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMBOMRequest $request)
    {
        //
        $data = [
            'nha' => $request->nha,
            'no_item' => $request->no_item,
            'component' => $request->component,
            'item_description' => $request->item_description,
            'quantity' => $request->quantity,
            'trpgmmodel_id' => $request->trpgmmodel,
        ];
        MBOM::create($data);
        Alert::success('Berhasil', 'Data MBOM Berhasil Ditambahkan!');
        return redirect('mbom');
    }

    /**
     * Display the specified resource.
     */
    public function show(MBOM $mBOM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MBOM $mBOM, string $id)
    {
        //
        return view('ditek.mbom.edit', [
            'title' => 'Update Data MBOM',
            'mbom'  => $mBOM->with('trpgmmodel')->findOrFail($id),
            'trpgmmodel'    => TRPGMMODEL::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMBOMRequest $request, MBOM $mBOM, string $id)
    {
        //
        $ee = $mBOM->findOrFail($id);
        $data = [
            'nha' => $request->nha,
            'no_item' => $request->no_item,
            'component' => $request->component,
            'item_description' => $request->item_description,
            'quantity' => $request->quantity,
            'trpgmmodel_id' => $request->trpgmmodel,
        ];
        $ee->update($data);
        Alert::success('Berhasil', 'Data MBOM Berhasil Diupdate!');
        return redirect('mbom');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MBOM $mBOM, string $id)
    {
        //
        $bom = $mBOM->findOrFail($id);
        $bom->delete();
        Alert::success('Berhasil', 'Data MBOM Berhasil Dihapus!');
        return redirect('mbom');
    }
}
