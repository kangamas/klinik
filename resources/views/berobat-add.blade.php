@extends('layout')
@section('content')
<h4>Form Add Berobat</h4>

<form class="m-3 mt-5" action="{{route('berobat.store')}}" method="POST">
    @csrf
    <div class="form-group row mb-2">
        <label for="inputEmail3" class="col-sm-3 col-form-label">No Transaksi</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="no_transaksi" value="{{$no_transaksi}}" required>
        </div>
    </div>
    <div class="form-group row mb-2">
        <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Pasien</label>
        <div class="col-sm-9">
            <select name="pasien_id" class="form-control" required>
                <option value="">-Pilih-</option>
                @foreach ($pasiens as $pasien)
                <option value="{{$pasien->pasien_id}}">{{$pasien->nama_pasien}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row mb-2">
        <label for="inputPassword3" class="col-sm-3 col-form-label">Tanggal Berobat</label>
        <div class="col-sm-3">

            <select name="tanggal" class="form-control" required>
                <option value="">-Tanggal-</option>
                @php
                for ($i=1; $i <= 31; $i++) { echo '<option value="' .$i.'">'.$i.'</option>';
                    }
                    @endphp

            </select>
        </div>
        <div class="col-sm-3">
            <select name="bulan" class="form-control" required>
                <option value="">-Bulan-</option>
                @php
                $bulan =
                ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Novmber','Desember'];

                @endphp
                @foreach ( $bulan as $index=>$bulan_item )
                <option value="{{$index+1}}">{{$bulan_item}}</option>
                @endforeach

            </select>
        </div>
        <div class="col-sm-3">
            <input type="number" name="tahun" class="form-control" required value="{{date('Y')}}" />
        </div>
    </div>
    <div class="form-group row mb-2">
        <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Dokter</label>
        <div class="col-sm-9">
            <select name="dokter_id" class="form-control" required>
                <option value="">-Pilih-</option>
                @foreach ($dokter as $dokter_item)
                <option value="{{$dokter_item->dokter_id}}">{{$dokter_item->nama_dokter}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row mb-2">
        <label for="inputEmail3" class="col-sm-3 col-form-label">Keluhan</label>
        <div class="col-sm-9">
            <textarea name="keluhan" rows="3" class="form-control" required></textarea>
        </div>
    </div>
    <div class="form-group row mb-2">
        <label for="inputEmail3" class="col-sm-3 col-form-label">Biaya Adm.</label>
        <div class="col-sm-9">
            <input type="number" class="form-control" name="biaya_adm" required>
        </div>
    </div>


    <div class="form-group row mb-2">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="reset" class="btn btn-warning">Reset</button>
        </div>
    </div>
</form>
@endsection
