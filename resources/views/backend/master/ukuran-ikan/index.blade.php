@extends('layout.main')
@section('Title', 'Manajemen Ukuran Ikan')
@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Manajemen Ukuran Ikan</h3>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a onclick="loadModal(this)" target="ukuran-ikan/add" title="Tambah Data" class="btn btn-primary">
                        <span class="glyphicon glyphicon-plus"></span> Tambah Data
                    </a>

                    <table class="table table-striped table-bordered table-hover" id="table-data">
                        <thead>
                        <tr>
                            <th width="3%">No</th>
                            <th>Nama Ukuran</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $num => $item)
                            <tr>
                                <td>{{$num+1}}</td>
                                <td>{{$item->fish_size_category_name}}</td>
                                <td>
                                    <a onclick="loadModal(this)" target="ukuran-ikan/add" data="id={{$item->id}}"
                                       class="btn btn-primary btn-xs glyphicon glyphicon-pencil" title="Ubah Data"></a>
                                    <a onclick="deleteData({{$item->id}})" class="btn btn-danger btn-xs glyphicon glyphicon-trash"
                                       title="Hapus Data"></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>


                <div class="clearfix"></div>
            </div>
        </div>

    </div>
    <br />

    <div class="row">
        &nbsp;
    </div>

@endsection


@section('custom-script')
    <script>
        $("#table-data").dataTable();

        function deleteData(id) {
            var data = new FormData();
            data.append('id', id);
            modalConfirm('Konfirmasi', 'Apakah anda yakin akan menghapus data?', function () {
                ajaxTransfer('ukuran-ikan/delete', data, '#modal-output');
            });
        }
    </script>
@endsection