<?php

namespace App\Http\Controllers;

use App\Models\EBOM;
use App\Http\Requests\StoreEBOMRequest;
use App\Http\Requests\UpdateEBOMRequest;
use App\Models\TRPGMMODEL;
use RealRashid\SweetAlert\Facades\Alert;

class EBOMController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('ditek.ebom.index', [
            'title' => 'Kelola EBOM',
            'eboms' => EBOM::with('trpgmmodel')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('ditek.ebom.add', [
            'title' => 'Add Data EBOM',
            'trpgmmodel'    => TRPGMMODEL::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEBOMRequest $request)
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
        EBOM::create($data);
        Alert::success('Berhasil', 'Data EBOM Berhasil Ditambahkan!');
        return redirect('ebom');
    }

    /**
     * Display the specified resource.
     */
    public function show(EBOM $eBOM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EBOM $eBOM, string $id)
    {
        //
        return view('ditek.ebom.edit', [
            'title' => 'Update Data EBOM',
            'ebom'  => $eBOM->with('trpgmmodel')->findOrFail($id),
            'trpgmmodel'    => TRPGMMODEL::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEBOMRequest $request, EBOM $eBOM, string $id)
    {
        //
        $ee = $eBOM->findOrFail($id);
        $data = [
            'nha' => $request->nha,
            'no_item' => $request->no_item,
            'component' => $request->component,
            'item_description' => $request->item_description,
            'quantity' => $request->quantity,
            'trpgmmodel_id' => $request->trpgmmodel,
        ];
        $ee->update($data);
        Alert::success('Berhasil', 'Data EBOM Berhasil Diupdate!');
        return redirect('ebom');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EBOM $eBOM, string $id)
    {
        //
        $bom = $eBOM->findOrFail($id);
        $bom->delete();
        Alert::success('Berhasil', 'Data EBOM Berhasil Dihapus!');
        return redirect('ebom');
    }
}
