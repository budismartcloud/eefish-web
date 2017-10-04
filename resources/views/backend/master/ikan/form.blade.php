<div id="results"></div>
<form method="POST" action="" onsubmit="return false" id="form-konten">
    <div class="form-group">
        <label for="name" class="col-sm-3 col-xs-12 control-label">Nama</label>
        <div class="col-sm-8 col-xs-12">
            <input type="text" name="fish_name" value="{{$data->fish_name}}" class="form-control" placeholder="Nama Ikan" required>
            <br>
        </div>
    </div>

    <div class="form-group">
        <label for="name" class="col-sm-3 col-xs-12 control-label">Kategori</label>
        <div class="col-sm-8 col-xs-12">
            <select name="fish_fish_categories_id" class="form-control">
                @foreach($fishCategories as $num => $item)
                    <option value="{{$item->id}}" @if($data->fish_fish_categories_id == $item->id) selected="selected" @endif>{{$item->fish_category_name}}</option>
                @endforeach
            </select>
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
        ajaxTransfer("ikan/save", data, "#results");
    })
</script>