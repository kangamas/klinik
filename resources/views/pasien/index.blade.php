@extends('layout')
@section('content')
<h4>{{$title}}</h4>
<div class="mt-1">
    @if (session('pesan'))
    <div class="alert alert-success">
        {{ session('pesan') }}
    </div>
    @endif
</div>
<a href="{{route('berobat.add')}}" class="btn btn-primary mb-3">Add New</a>
<div class="table-responsive">
    <table class="table table-bordered ">
        <thead class="table-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Id</th>
                <th scope="col">Nama Pasien</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Jenis Kelamain</th>
                <th scope="col">Alamat</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $no=>$data)

            <tr>
                <th scope="row">{{$no+1}}</th>
                <td>{{$data->pasien_id}}</td>
                <td>{{$data->nama_pasien}}</td>
                <td>{{$data->tanggal_lahir}}</td>
                <td>{{$data->jenis_kelamin}}</td>
                <td>{{$data->alamat}}</td>
                <td>
                    <a href="{{route('berobat.edit',$data->pasien_id)}}">edit</a> |
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
                                <form action="{{route('berobat.delete',$data->pasien_id)}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <div class="modal-body">
                                        Apakah anda yakin, akan mengahapus data ini ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">No</button>
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
</div>
@endsection
