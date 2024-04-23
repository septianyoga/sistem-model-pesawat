<?php

namespace App\Http\Controllers;

use App\Models\EBOM;
use App\Http\Requests\StoreEBOMRequest;
use App\Http\Requests\UpdateEBOMRequest;
use App\Imports\EBOMImport;
use App\Models\TRPGMMODEL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Maatwebsite\Excel\Facades\Excel;
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
            'title' => 'View Data EBOM',
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

    public function import(Request $request)
    {
        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand() . $file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('file_excel', $nama_file);

        // import data
        Excel::import(new EBOMImport, public_path('/file_excel/' . $nama_file));

        // hapus file setelah impor selesai
        unlink(public_path('/file_excel/' . $nama_file));

        // notifikasi dengan session
        Alert::success('Berhasil', 'Data EBOM Berhasil Diimport!');
        return redirect()->to('/ebom');
    }

    public function download()
    {
        $file = public_path() . "/file_excel/template_ebom.xlsx";
        return Response::download($file);
    }
}
