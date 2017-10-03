<div id="results"></div>
<form method="POST" action="" onsubmit="return false" id="form-konten">
    <div class="form-group">
        <label for="name" class="col-sm-3 col-xs-12 control-label">Nama</label>
        <div class="col-sm-8 col-xs-12">
            <input type="text" name="user_full_name" value="{{$data->user_full_name}}" class="form-control" placeholder="Nama Lengkap">
            <br>
        </div>
    </div>

    <div class="form-group">
        <label for="name" class="col-sm-3 col-xs-12 control-label">Username</label>
        <div class="col-sm-8 col-xs-12">
            <input type="text" name="user_username" value="{{$data->user_username}}" class="form-control" placeholder="Username">
            <br>
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-sm-3 col-xs-12 control-label">Password</label>
        <div class="col-sm-8 col-xs-12">
            <input type="password" name="user_password" class="form-control" placeholder="Password">
            <br>
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-sm-3 col-xs-12 control-label">Nomor Identitas</label>
        <div class="col-sm-8 col-xs-12">
            <input type="text" name="user_identity_number" value="{{$data->user_identity_number}}" class="form-control" placeholder="Nomor Identitas">
            <br>
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-sm-3 col-xs-12 control-label">Email</label>
        <div class="col-sm-8 col-xs-12">
            <input type="text" name="user_email" value="{{$data->user_email}}" class="form-control" placeholder="Email">
            <br>
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-sm-3 col-xs-12 control-label">Alamat</label>
        <div class="col-sm-8 col-xs-12">
            <textarea name="user_address" class="form-control" placeholder="Alamat">{{$data->user_address}}</textarea>
            <br>
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-sm-3 col-xs-12 control-label">Kode Pos</label>
        <div class="col-sm-8 col-xs-12">
            <input type="text" name="user_post_code" value="{{$data->user_post_code}}" class="form-control" placeholder="Kode Pos">
            <br>
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-sm-3 col-xs-12 control-label">Foto</label>
        <div class="col-sm-8 col-xs-12">
            <input type="file" name="user_picture" class="form-control">
            <br>
        </div>
    </div>
    <div class="form-group">
        <label for="name" class="col-sm-3 col-xs-12 control-label">Nomor HP</label>
        <div class="col-sm-8 col-xs-12">
            <input type="text" name="user_phone_number" value="{{$data->user_phone_number}}" class="form-control" placeholder="Nomor Telepon">
            <br>
        </div>
    </div>

    <input type="hidden" name="id" value="{{$data->id}}">

    <div class="form-group">
        <label for="name" class="col-sm-3 col-xs-12 control-label"></label>
        <div class="col-sm-8 col-xs-12">
            <input type="submit" class="btn btn-primary" value="Simpan Data">
            <br><br>
        </div>
    </div>
</form>

<script>
    $("#form-konten").submit(function () {
        var data = getFormData("form-konten");
        ajaxTransfer("pengguna/save", data, "#results");
    })
</script>