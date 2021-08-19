<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PasienController extends Controller
{
    function index()
    {
        $data['title'] = "Data Pasien";
        $data['datas'] = DB::table('pasien')->orderBy('nama_pasien')->get();
        return view('pasien.index', $data);
    }
    function add()
    {
    }
    function edit()
    {
    }
}
