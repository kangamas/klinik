<!doctype html>
<html lang="en">

<head>
    <title>Aplikasi Klinik</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container m-5">
        <div class="row">
            <div class="col-md-3">
                @include('menu')
            </div>
            <div class="col-md-9">
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
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">No Transaksi</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="no_transaksi" value="{{$berobat->no_transaksi}}"
                                required>
                        </div>
                    </div>
                    <div class="form-group row">
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
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Tanggal Berobat</label>
                        <div class="col-sm-3">
                            <select name="tanggal" class="form-control" required>
                                @php
                                for ($i=1; $i <= 31; $i++) {
                                @endphp
                                <option value="{{$i}}">{{$i}}</option>
                                @php
                                }
                                @endphp

                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select name="bulan" class="form-control" required>
                                @php
                                $bulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Novmber','Desember'];

                                @endphp
                                @foreach ( $bulan as $index=>$bulan_item )
                                <option value="{{$index+1}}">{{$bulan_item}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select name="tahun" class="form-control" required>
                                @php
                                for ($i=1990; $i <= date("Y") ; $i++) {
                                    echo '<option value="' .$i.'">'.$i.'</option>';
                                }
                                @endphp

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">Nama Dokter</label>
                        <div class="col-sm-9">
                            <select name="dokter_id" class="form-control" required>
                                <option value="">-Pilih-</option>
                                @foreach ($dokter as $dokter_item)
                                <option value="{{$dokter_item->dokter_id}}"
                                    {{ $berobat->dokter_id == $dokter_item->dokter_id ? "selected" : "" }}>{{$dokter_item->nama_dokter}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Keluhan</label>
                        <div class="col-sm-9">
                            <textarea name="keluhan" rows="3" class="form-control" required>{{$berobat->keluhan}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Biaya Adm.</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" name="biaya_adm" value="{{$berobat->biaya_adm}}" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</body>

</html>
