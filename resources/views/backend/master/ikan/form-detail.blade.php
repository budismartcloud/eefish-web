<div id="results"></div>
<form method="POST" action="" onsubmit="return false" id="form-konten">
    <div class="form-group">
        <label for="name" class="col-sm-3 col-xs-12 control-label">Nama Item</label>
        <div class="col-sm-8 col-xs-12">
            <input type="text" name="fish_item_name" value="{{$data->fish_item_name}}" class="form-control" placeholder="Nama Item" required>
            <br>
        </div>
    </div>

    <div class="form-group">
        <label for="name" class="col-sm-3 col-xs-12 control-label">Ukuran Item</label>
        <div class="col-sm-8 col-xs-12">
            <select name="fish_item_fish_size_categories_id" class="form-control">
                @foreach($fishSizeCategories as $num => $item)
                    <option value="{{$item->id}}">{{$item->fish_size_category_name}}</option>
                @endforeach
            </select>
            <br>
        </div>
    </div>

    <div class="form-group">
        <label for="name" class="col-sm-3 col-xs-12 control-label">Berat Item</label>
        <div class="col-sm-8 col-xs-12">
            <input type="text" name="fish_item_weight" value="{{$data->fish_item_weight}}" class="form-control" placeholder="Berat Item" required>
            <br>
        </div>
    </div>

    <div class="form-group">
        <label for="name" class="col-sm-3 col-xs-12 control-label">Jumlah Item</label>
        <div class="col-sm-8 col-xs-12">
            <input type="text" name="fish_item_quantity" value="{{$data->fish_item_quantity}}" class="form-control" placeholder="Jumlah Item" required>
            <br>
        </div>
    </div>

    <div class="form-group">
        <label for="name" class="col-sm-3 col-xs-12 control-label">Harga Item (Per ekor per 100gram)</label>
        <div class="col-sm-8 col-xs-12">
            <input type="text" name="fish_item_specific_price" value="{{$data->fish_item_specific_price}}" class="form-control" placeholder="Harga Item (Per ekor per 100gram)" required>
            <br>
        </div>
    </div>

    <div class="form-group">
        <label for="name" class="col-sm-3 col-xs-12 control-label">Harga Item (Per kg)</label>
        <div class="col-sm-8 col-xs-12">
            <input type="text" name="fish_item_normal_price" value="{{$data->fish_item_normal_price}}" class="form-control" placeholder="Harga Item (Per kg)" required>
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
        ajaxTransfer("save-detail", data, "#results");
    })
</script>