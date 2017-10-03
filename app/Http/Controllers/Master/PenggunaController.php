<?php
namespace App\Http\Controllers\Master;
/**
 * Created by PhpStorm.
 * User: Budi
 * Date: 6/1/2017
 * Time: 6:29 AM
 */
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenggunaController extends Controller
{
    public function index()
    {
        $data = User::orderBy('user_full_name', 'ASC')->get();
        $params = [
            'data' => $data
        ];
        return view('backend.master.pengguna.index', $params);
    }

    public function add(Request $request)
    {
        $id = $request->input('id');
        if($id){
            $data = User::find($id);
        }else{
            $data = new User();
        }

        $params = [
            'data' => $data
        ];

        return view('backend.master.pengguna.form', $params);
    }

    public function save(Request $request)
    {
        $id = $request->input('id');
        if($id){
            $data = User::find($id);
        }else{
            $data = new User();
            $data->user_cities_id = 2;
        }

        $data->user_username = $request->input('user_username');
        $data->user_password = sha1($request->input('user_password'));
        $data->user_identity_number = $request->input('user_identity_number');
        $data->user_address = $request->input('user_address');
        $data->user_post_code = $request->input('user_post_code');
        $data->user_phone_number = $request->input('user_phone_number');
        $data->user_full_name = $request->input('user_full_name');
        $data->user_email = $request->input('user_email');

        /******** Save image ***************/
        $picture = $request->file('user_picture');
        if (isset($picture)) {
            $filename = date("YmdHis"). '-' . $picture->getClientOriginalName();
            if ($picture->move("public/uploads/pengguna", $filename)) {
                $data->user_picture = $filename;
            }
        }

        /**********************************/

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
        $data = User::find($id);
        try{
            $data->delete();
            return "
            <div class='alert alert-success'>Data berhasil dihapus!</div>
            <script> scrollToTop(); reload(1000); </script>";
        }catch (\Exception $e){
            return "<div class='alert alert-danger'>Data gagal dihapus!</div>";
        }
    }

    public function detail($id)
    {
        $user = User::find($id);
        $params = [
            'data' => $user
        ];

        return view('backend.master.pengguna.detail', $params);
    }
}