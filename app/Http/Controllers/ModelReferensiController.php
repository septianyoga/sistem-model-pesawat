<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreModelReferensiRequest;
use App\Http\Requests\UpdateModelReferensiRequest;
use App\Models\TRPGM;
use App\Models\TRPGMMODEL;
use App\Models\TRPGMSUB;
use App\Models\TRPON;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ModelReferensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('ditek.model_referensi.index', [
            'title' => 'Kelola Model Referensi',
            'models'    => TRPGMMODEL::with(['trpgm', 'trpgmsub', 'trpon', 'user'])->get(),
            'trpgms'    => TRPGM::all(),
            'trpgmsubs' => TRPGMSUB::all(),
            'trpons'    => TRPON::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('ditek.model_referensi.add', [
            'title' => 'Add Data Model',
            'trpgms'    => TRPGM::all(),
            'trpgmsubs' => TRPGMSUB::all(),
            'trpons'    => TRPON::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreModelReferensiRequest $request)
    {
        //
        TRPGMMODEL::create([
            'trpgm_id'  => $request->trpgm_id,
            'trpgmsub_id'   => $request->trpgmsub_id,
            'trpon_id'   => $request->trpon_id,
            'c_pgm_model'   => $request->c_pgm_model,
            'i_part_nha'   => $request->i_part_nha,
            'n_pgm_model'   => $request->n_pgm_model,
            'user_id'   => Auth::user()->id,
            'd_entry'   => date('Y-m-d')
        ]);
        Alert::success('Berhasil', 'Model Referensi Berhasil Ditambah!');
        return redirect()->to('/model_referensi');
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
    public function edit(TRPGMMODEL $tRPGMMODEL, string $id)
    {
        //
        return view('ditek.model_referensi.edit', [
            'title' => 'Update Data Model',
            'model'    => TRPGMMODEL::findOrFail($id),
            'trpgms'    => TRPGM::all(),
            'trpgmsubs' => TRPGMSUB::all(),
            'trpons'    => TRPON::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateModelReferensiRequest $request, TRPGMMODEL $tRPGMMODEL, string $id)
    {
        //
        $model = TRPGMMODEL::findOrFail($id);
        $model->update([
            'trpgm_id'  => $request->trpgm_id,
            'trpgmsub_id'   => $request->trpgmsub_id,
            'trpon_id'   => $request->trpon_id,
            'c_pgm_model'   => $request->c_pgm_model,
            'i_part_nha'   => $request->i_part_nha,
            'n_pgm_model'   => $request->n_pgm_model,
        ]);
        Alert::success('Berhasil', 'Model Referensi Berhasil Ditambah!');
        return redirect()->to('/model_referensi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TRPGMMODEL $tRPGMMODEL, string $id)
    {
        //
        $check = TRPGMMODEL::findOrFail($id);
        $check->delete();
        Alert::success('Berhasil', 'Model Referensi Berhasil Dihapus!');
        return redirect()->to('/model_referensi');
    }

    public function viewModel()
    {
        return view('dipro.view_model', [
            'title' => 'View Data Referensi Model Pesawat',
            'models'    => TRPGMMODEL::with(['trpgm', 'trpgmsub', 'trpon', 'user'])->get(),
            'trpgms'    => TRPGM::all(),
            'trpgmsubs' => TRPGMSUB::all(),
            'trpons'    => TRPON::all()
        ]);
    }
}
