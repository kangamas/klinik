<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BerobatController extends Controller
{
    function get_datas()
    {
        $data['datas'] = DB::table('berobat as b')
            ->join('pasien as p', 'b.pasien_id', '=', 'p.pasien_id')
            ->join('dokter as d', 'b.dokter_id', '=', 'd.dokter_id')
            ->join('poli as pl', 'd.poli_id', '=', 'pl.poli_id')
            ->select(
                'b.*',
                'p.pasien_id',
                'p.nama_pasien',
                'p.jenis_kelamin',
                'p.tanggal_lahir',
                'pl.nama_poli',
                'd.nama_dokter'
            )
            ->get();
        return view('berobat', $data);
    }

    function add()
    {
        $data['pasiens'] = DB::table('pasien')->get();
        $data['dokter'] = DB::table('dokter')->get();

        $count_berobat = DB::table('berobat')->count() + 1;
        $data['no_transaksi'] = "TR" . sprintf('%03d', $count_berobat);
        return view('berobat-add', $data);
    }
    function store(Request $request)
    {
        $request->validate([
            'no_transaksi' => 'required|string|max:5|min:4',
            'pasien_id' => 'required|string',
            'tanggal' => 'required|numeric',
            'bulan' => 'required|numeric',
            'tahun' => 'required|numeric',
            'dokter_id' => 'required|string',
            'keluhan' => 'required|string',
            'biaya_adm' => 'required|numeric',
        ]);
        // insert to db
        DB::table('berobat')->insert([
            'no_transaksi' => $request->no_transaksi,
            'pasien_id' => $request->pasien_id,
            'tanggal_berobat' => $request->tahun . "-" . $request->bulan . '-' . $request->tanggal,
            'dokter_id' => $request->dokter_id,
            'keluhan' => $request->keluhan,
            'biaya_adm' => $request->biaya_adm
        ]);
        return redirect()->route('berobat.index')->with('pesan', 'Data berhasil disimpan.');
    }
    function edit(Request $request, $id)
    {
        if (DB::table('berobat')->where('no_transaksi', $id)->exists()) {
            $data['pasiens'] = DB::table('pasien')->get();
            $data['dokter'] = DB::table('dokter')->get();
            $data['berobat'] = DB::table('berobat')->where('no_transaksi', $id)->first();
            $tanggal_berobat = DB::table('berobat')->where('no_transaksi', $id)->first()->tanggal_berobat;
            $data['tanggal'] = date_format(date_create($tanggal_berobat), 'j');
            $data['bulan'] = date_format(date_create($tanggal_berobat), 'n');
            $data['tahun'] = date_format(date_create($tanggal_berobat), 'Y');
            return view('berobat-edit', $data);
        } else {
            return redirect()->route('berobat.index')->with('pesan', 'Data tidak ditemukan.');
        }
    }
    function update(Request $request, $id)
    {
        $request->validate([
            'no_transaksi' => 'required|string|max:5|min:4',
            'pasien_id' => 'required|string',
            'tanggal' => 'required|numeric',
            'bulan' => 'required|numeric',
            'tahun' => 'required|numeric',
            'dokter_id' => 'required|string',
            'keluhan' => 'required|string',
            'biaya_adm' => 'required|numeric',
        ]);
        $edit = DB::table('berobat')->where('no_transaksi', $id)->update([
            'pasien_id' => $request->pasien_id,
            'tanggal_berobat' => $request->tahun . "-" . $request->bulan . '-' . $request->tanggal,
            'dokter_id' => $request->dokter_id,
            'keluhan' => $request->keluhan,
            'biaya_adm' => $request->biaya_adm
        ]);
        if ($edit) {
            $pesan = "Data berhasil diupdate.";
        } else {
            $pesan = "Data Tidak berhasil diupdate";
        }
        return redirect()->route('berobat.index')->with('pesan', $pesan);
    }
    function delete($id)
    {
        if (DB::table('berobat')->where('no_transaksi', $id)->exists()) {
            DB::table('berobat')->where('no_transaksi', $id)->delete();
            return redirect()->route('berobat.index')->with('pesan', 'Data berhasil dihapus.');
        } else {
            return redirect()->route('berobat.index')->with('pesan', 'Data tidak ditemukan.');
        }
    }
}
