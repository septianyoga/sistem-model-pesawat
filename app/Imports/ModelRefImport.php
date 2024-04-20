<?php

namespace App\Imports;

use App\Models\TRPGM;
use App\Models\TRPGMMODEL;
use App\Models\TRPGMSUB;
use App\Models\TRPON;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ModelRefImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        // dd($row);

        $trpgm = TRPGM::where('c_pgm', $row['trpgm'])->first() ?? null;
        $trpgm_sub = TRPGMSUB::where('c_pgm_sub', $row['trpgm_sub'])->first() ?? null;
        $trpon = TRPON::where('c_pgm', $row['trpon'])->first() ?? null;
        $user = User::where('id', $row['user_id'])->first() ?? null;

        // dd($trpgm_sub);

        return new TRPGMMODEL([
            //
            'trpgm_id'      => $trpgm->id,
            'trpgmsub_id'   => $trpgm_sub->id,
            'trpon_id'      => $trpon->id,
            'c_pgm_model'   => $row['c_pgm_model'],
            'i_part_nha'    => $row['i_part_nha'],
            'n_pgm_model'   => $row['n_pgm_model'],
            'user_id'       => $user->id,
            'd_entry'       => $row['d_entry']
        ]);
    }
}
