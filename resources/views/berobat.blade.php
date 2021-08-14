<!doctype html>
<html lang="en">

<head>
    <title>Aplikasi Klinik - Berobat</title>
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
                <h4>Berobat</h4>
                <div class="mt-1">
                    @if (session('pesan'))
                    <div class="alert alert-success">
                        {{ session('pesan') }}
                    </div>
                    @endif
                </div>
                <a href="{{route('berobat.add')}}" class="btn btn-primary mb-3">Add New</a>
                <table class="table">
                    <thead>
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

                        <tr>
                            <th scope="row">{{$no+1}}</th>
                            <td>{{$data->no_transaksi}}</td>
                            <td>{{$data->tanggal_berobat}}</td>
                            <td>{{$data->nama_pasien}}</td>
                            <td>{{$data->tanggal_lahir}}</td>
                            <td>{{$data->jenis_kelamin}}</td>
                            <td>{{$data->keluhan}}</td>
                            <td>{{$data->nama_poli}}</td>
                            <td>{{$data->nama_dokter}}</td>
                            <td>{{$data->biaya_adm}}</td>
                            <td>
                                <a href="{{route('berobat.edit',$data->no_transaksi)}}">edit</a> |
                                <a data-toggle="modal" data-target="#modal-delete{{$no}}">Delete</a>

                                <div class="modal fade" id="modal-delete{{$no}}" tabindex="-1" role="dialog"
                                    aria-labelledby="modal-deleteLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modal-deleteLabel">Delete Confirmation</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('berobat.delete',$data->no_transaksi)}}"
                                                method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <div class="modal-body">
                                                    Apakah anda yakin, akan mengahapus data ini ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">No</button>
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
