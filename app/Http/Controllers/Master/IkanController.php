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
use App\FishCategory;

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
        $data->fish_fish_category_id = $request->input('fish_fish_catgeory_id');
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
}