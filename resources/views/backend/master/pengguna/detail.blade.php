@extends('layout.main')
@section('Title', 'Manajemen Pengguna')
@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Detail Pengguna</h3>
                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="col-lg-6 col-md-6 col-xs-12">
                        <img src="{{asset('public/uploads/pengguna/'.$data->user_picture)}}" style="width: 100%">
                        <br>
                    </div>

                    <div class="col-lg-6 col-md-6 col-xs-12">

                        <a href="{{url('master/pengguna')}}" class="btn btn-xs btn-warning">
                            <span class="glyphicon glyphicon-arrow-left"></span> Kembali
                        </a>

                        <h3>Biodata Lengkap</h3>
                        <table class="table table-striped table-hover">
                            <tr>
                                <td width="15%">Nama</td>
                                <td width="5%">:</td>
                                <td>{{$data->user_full_name}}</td>
                            </tr>

                            <tr>
                                <td width="15%">Username</td>
                                <td width="5%">:</td>
                                <td>{{$data->user_username}}</td>
                            </tr>

                            <tr>
                                <td width="15%">Identitas</td>
                                <td width="5%">:</td>
                                <td>{{$data->user_identity_number}}</td>
                            </tr>

                            <tr>
                                <td width="15%">Alamat</td>
                                <td width="5%">:</td>
                                <td>{{$data->user_address}}</td>
                            </tr>

                            <tr>
                                <td width="15%">Kode POS</td>
                                <td width="5%">:</td>
                                <td>{{$data->user_post_code}}</td>
                            </tr>

                            <tr>
                                <td width="15%">Nomor Telepon</td>
                                <td width="5%">:</td>
                                <td>{{$data->user_phone_number}}</td>
                            </tr>

                            <tr>
                                <td width="15%">Email</td>
                                <td width="5%">:</td>
                                <td>{{$data->user_email}}</td>
                            </tr>
                        </table>

                    </div>


                </div>


                <br><br>
                <div class="clearfix"></div>

            </div>

        </div>
    </div>


    <div class="row">
        &nbsp;
     </div>

@endsection