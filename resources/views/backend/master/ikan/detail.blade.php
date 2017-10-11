@extends('layout.main')
@section('Title', 'Manajemen Detail Ikan')
@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Manajemen Detail Ikan</h3>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    @if(!is_null($fish))
                        <a onclick="loadModal(this)" target="add-detail" title="Tambah Data Detail Ikan" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus"></span> Tambah Data
                        </a>

                        <table class="table table-striped table-bordered table-hover" id="table-data">
                            <thead>
                            <tr>
                                <th width="3%">No</th>
                                <th>Nama Ikan</th>
                                <th>Ukuran Ikan</th>
                                <th>Berat</th>
                                <th>Jumlah</th>
                                <th>Harga Per ekor</th>
                                <th>Harga Per kg</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $num => $item)
                                    <tr>
                                        <td>{{$num+1}}</td>
                                        <td>{{$fish->fish_name}}</td>
                                        <td>{{$item->getSize->fish_size_category_name}}</td>
                                        <td>{{number_format($item->fish_item_weight)}} kg</td>
                                        <td>{{number_format($item->fish_item_quantity)}} ekor</td>
                                        <td>Rp. {{number_format($item->fish_item_specific_price)}}</td>
                                        <td>Rp. {{number_format($item->fish_item_normal_price)}}</td>
                                        <td>
                                            <a onclick="loadModal(this)" target="add-detail" data="id={{$item->id}}"
                                               class="btn btn-primary btn-xs glyphicon glyphicon-pencil" title="Ubah Data"></a>
                                            <a onclick="deleteData({{$item->id}})" class="btn btn-danger btn-xs glyphicon glyphicon-trash"
                                               title="Hapus Data"></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    @else

                        <div class="alert alert-danger">Terjadi kesalahan! Data ikan tidak ditemukan</div>

                    @endif



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
                ajaxTransfer('delete-detail', data, '#modal-output');
            });
        }
    </script>
@endsection