@extends('layout')
@section('content')
<h4>Form Edit Berobat</h4>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form class="m-3 mt-5" action="{{route('berobat.update',$berobat->no_transaksi)}}" method="POST">
    @csrf
    @method("PATCH")
    <div class="form-group row mb-2">
        <label for="inputEmail3" class="col-sm-3 col-form-label">No Transaksi</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="no_transaksi" value="{{$berobat->no_transaksi}}" required>
        </div>
    </div>
    <div class="form-group row mb-2">
        <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Pasien</label>
        <div class="col-sm-9">
            <select name="pasien_id" class="form-control" required>
                <option value="">-Pilih-</option>
                @foreach ($pasiens as $pasien)
                <option value="{{$pasien->pasien_id}}"
                    {{ $berobat->pasien_id == $pasien->pasien_id ? "selected" : "" }}>{{$pasien->nama_pasien}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row mb-2">
        <label for="inputPassword3" class="col-sm-3 col-form-label">Tanggal Berobat</label>
        <div class="col-sm-3">
            <select name="tanggal" class="form-control" required>
                @php
                for ($i=1; $i <= 31; $i++) { if ($i==$tanggal) { $select="selected" ; } else { $select="" ; }
                    echo '<option value="' .$i.'" '.$select.'>'.$i.'</option>
                    ' ; }
                    @endphp
            </select>
        </div>
        <div class="col-sm-3">
            <select name="bulan" class="form-control" required>
                @php
                $bulans =
                ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Novmber','Desember'];

                @endphp
                @foreach ( $bulans as $index=>$bulan_item )
                @php
                if (($index+1) == $bulan) {
                $slc = "selected";
                } else {
                $slc = "";
                }
                @endphp
                <option value="{{$index+1}}" {{$slc}}>{{$bulan_item}}</option>
                @endforeach

            </select>
        </div>
        <div class="col-sm-3">
            <input class="form-control" type="number" name="tahun" value="{{$tahun}}" required>
        </div>
    </div>
    <div class="form-group row mb-2">
        <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Dokter</label>
        <div class="col-sm-9">
            <select name="dokter_id" class="form-control" required>
                <option value="">-Pilih-</option>
                @foreach ($dokter as $dokter_item)
                <option value="{{$dokter_item->dokter_id}}"
                    {{ $berobat->dokter_id == $dokter_item->dokter_id ? "selected" : "" }}>{{$dokter_item->nama_dokter}}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row mb-2">
        <label for="inputEmail3" class="col-sm-3 col-form-label">Keluhan</label>
        <div class="col-sm-9">
            <textarea name="keluhan" rows="3" class="form-control" required>{{$berobat->keluhan}}</textarea>
        </div>
    </div>
    <div class="form-group row mb-2">
        <label for="inputEmail3" class="col-sm-3 col-form-label">Biaya Adm.</label>
        <div class="col-sm-9">
            <input type="number" class="form-control" name="biaya_adm" value="{{$berobat->biaya_adm}}" required>
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
