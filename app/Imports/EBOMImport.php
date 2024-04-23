<?php

namespace App\Imports;

use App\Models\EBOM;
use App\Models\TRPGMMODEL;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EBOMImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $trpgmmodel = TRPGMMODEL::where('c_pgm_model', $row['c_pgm_model'])->first() ?? null;
        return new EBOM([
            //
            'nha' => $row['nha'],
            'no_item' => $row['no_item'],
            'component' => $row['component'],
            'item_description' => $row['item_description'],
            'quantity' => $row['quantity'],
            'trpgmmodel_id' => $trpgmmodel->id,
        ]);
    }
}
