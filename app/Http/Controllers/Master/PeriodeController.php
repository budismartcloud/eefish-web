<?php
namespace App\Http\Controllers\Master;
/**
 * Created by PhpStorm.
 * User: Budi
 * Date: 6/1/2017
 * Time: 6:29 AM
 */
use App\Http\Controllers\Controller;
use App\Models\Period;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    public function index()
    {
        $data = Period::orderBy('period_name', 'DESC')->get();
        $params = [
            'data' => $data
        ];
        return view('backend.master.periode.index', $params);
    }

    public function add(Request $request)
    {
        $id = $request->input('id');
        if($id){
            $data = Period::find($id);
        }else{
            $data = new Period();
        }

        $params = [
            'data' => $data
        ];

        return view('backend.master.periode.form', $params);
    }

    public function save(Request $request)
    {
        $id = $request->input('id');
        if($id){
            $data = Period::find($id);
        }else{
            $data = new Period();
        }

        $data->period_name = $request->input('period_name');
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
        $data = Period::find($id);

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