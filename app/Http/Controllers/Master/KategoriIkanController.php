<?php
namespace App\Http\Controllers\Master;
/**
 * Created by PhpStorm.
 * User: Budi
 * Date: 6/1/2017
 * Time: 6:29 AM
 */
use App\Http\Controllers\Controller;
use App\Models\FishCategory;
use Illuminate\Http\Request;

class KategoriIkanController extends Controller
{
    public function index()
    {
        $data = FishCategory::orderBy('fish_category_name', 'ASC')->get();
        $params = [
            'data' => $data
        ];
        return view('backend.master.kategori-ikan.index', $params);
    }

    public function add(Request $request)
    {
        $id = $request->input('id');
        if($id){
            $data = FishCategory::find($id);
        }else{
            $data = new FishCategory();
        }

        $params = [
            'data' => $data
        ];

        return view('backend.master.kategori-ikan.form', $params);
    }

    public function save(Request $request)
    {
        $id = $request->input('id');
        if($id){
            $data = FishCategory::find($id);
        }else{
            $data = new FishCategory();
        }

        $data->fish_category_name = $request->input('fish_category_name');
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
        $data = FishCategory::find($id);

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