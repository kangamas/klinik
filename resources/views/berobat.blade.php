@extends('layout')
@section('content')
<h4>Berobat</h4>
<div class="mt-1">
    @if (session('pesan'))
    <div class="alert alert-success">
        {{ session('pesan') }}
    </div>
    @endif
</div>
<a href="{{route('berobat.add')}}" class="btn btn-primary mb-3">Add New</a>
<table class="table table-bordered table-responsive">
    <thead class="table-light">
        <tr>
            <th scope="col">No</th>
            <th scope="col">No Transaksi</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Nama Pasien</th>
            <th scope="col">Usia</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">keluhan</th>
            <th scope="col">Nama Poli</th>
            <th scope="col">Dokter</th>
            <th scope="col">Biaya Admin</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $no=>$data)
        @php
        $dob = new DateTime($data->tanggal_lahir);
        $now = new DateTime('today');
        $age = $now->diff($dob)->y;
        @endphp
        <tr>
            <th scope="row">{{$no+1}}</th>
            <td>{{$data->no_transaksi}}</td>
            <td>{{$data->tanggal_berobat}}</td>
            <td>{{$data->nama_pasien}}</td>
            <td>{{$age}}</td>
            <td>{{$data->jenis_kelamin}}</td>
            <td>{{$data->keluhan}}</td>
            <td>{{$data->nama_poli}}</td>
            <td>{{$data->nama_dokter}}</td>
            <td>{{$data->biaya_adm}}</td>
            <td>
                <a href="{{route('berobat.edit',$data->no_transaksi)}}">edit</a> |
                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-delete{{$no}}">Delete</a>

                <div class="modal fade" id="modal-delete{{$no}}" tabindex="-1" role="dialog"
                    aria-labelledby="modal-deleteLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-deleteLabel">Delete Confirmation</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('berobat.delete',$data->no_transaksi)}}" method="POST">
                                @csrf
                                @method("DELETE")
                                <div class="modal-body">
                                    Apakah anda yakin, akan mengahapus data ini ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                    <button type="submit" class="btn btn-danger">Yes, Delete</button>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection
