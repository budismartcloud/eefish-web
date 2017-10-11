<?php
namespace App\Http\Controllers\Master;
/**
 * Created by PhpStorm.
 * User: Budi
 * Date: 6/1/2017
 * Time: 6:29 AM
 */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fish;
use App\Models\FishCategory;
use App\Models\FishItem;
use App\Models\FishSizeCategory;

class IkanController extends Controller
{
    public function index()
    {
        $data = Fish::orderBy('fish_name', 'ASC')->get();
        $params = [
            'data' => $data
        ];
        return view('backend.master.ikan.index', $params);
    }

    public function add(Request $request)
    {
        $id = $request->input('id');
        if($id){
            $data = Fish::find($id);
        }else{
            $data = new Fish();
        }

        $fishCategories = FishCategory::orderBy('fish_category_name', 'ASC')->get();

        $params = [
            'data' => $data,
            'fishCategories' => $fishCategories
        ];

        return view('backend.master.ikan.form', $params);
    }

    public function save(Request $request)
    {
        $id = $request->input('id');
        if($id){
            $data = Fish::find($id);
        }else{
            $data = new Fish();
        }

        $data->fish_name = $request->input('fish_name');
        $data->fish_fish_categories_id = $request->input('fish_fish_categories_id');
        try{
            $data->save();
            return "
            <div class='alert alert-success'>Data berhasil disimpan!</div>
            <script> scrollToTop(); reload(1000); </script>";
        }catch (\Exception $e){
            return "<div class='alert alert-danger'>Data gagal disimpan!</div>";
        }
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $data = Fish::find($id);

        try{
            $data->delete();
            return "
            <div class='alert alert-success'>Data berhasil dihapus!</div>
            <script> scrollToTop(); reload(1000); </script>";
        }catch (\Exception $e){
            return "<div class='alert alert-danger'>Data gagal dihapus!</div>";
        }
    }

    public function detail($fish)
    {
        $dataFish = Fish::find($fish);
        $data = [];
        if(!is_null($dataFish)){
            $data = FishItem::where(['fish_item_fishes_id' => $fish])->get();
        }

        $params = [
            'fish' => $dataFish,
            'data' => $data
        ];

        return view('backend.master.ikan.detail', $params);
    }

    public function addDetail($fish, Request $request)
    {
        $dataFish = Fish::find($fish);
        $id = $request->input('id');
        if($id){
            $data = FishItem::find($id);
        }else{
            $data = new FishItem();
        }

        $fishSizeCategories = FishSizeCategory::orderBy('fish_size_category_name', 'ASC')->get();

        $params = [
            'fish' => $dataFish,
            'data' => $data,
            'fishSizeCategories' => $fishSizeCategories
        ];

        return view('backend.master.ikan.form-detail', $params);
    }

    public function saveDetail($fish, Request $request)
    {
        $dataFish = Fish::find($fish);
        if(!is_null($dataFish)){
            $id = $request->input('id');
            if($id){
                $data = FishItem::find($id);
            }else{
                $data = new FishItem();
            }

            $data->fish_item_name = $request->input('fish_item_name');
            $data->fish_item_fishes_id = $fish;
            $data->fish_item_fish_size_categories_id = $request->input('fish_item_fish_size_categories_id');
            $data->fish_item_weight = $request->input('fish_item_weight');
            $data->fish_item_quantity = $request->input('fish_item_quantity');
            $data->fish_item_specific_price = $request->input('fish_item_specific_price');
            $data->fish_item_normal_price = $request->input('fish_item_normal_price');

            try{
                $data->save();
                return "
                <div class='alert alert-success'>Data berhasil disimpan!</div>
                <script> scrollToTop(); reload(1000); </script>";
            }catch (\Exception $e){
                return "<div class='alert alert-danger'>Data gagal disimpan!</div>";
            }
        }else{
            return "<div class='alert alert-danger'>Data ikan tidak ditemukan!</div>";
        }
    }

    public function deleteDetail($fish, Request $request)
    {
        $id = $request->input('id');
        $data = FishItem::find($id);

        try{
            $data->delete();
            return "
            <div class='alert alert-success'>Data berhasil dihapus!</div>
            <script> scrollToTop(); reload(1000); </script>";
        }catch (\Exception $e){
            return "<div class='alert alert-danger'>Data gagal dihapus!</div>";
        }
    }
}