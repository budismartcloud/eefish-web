<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/27/2017
 * Time: 9:37 AM
 */

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request){
        if ($request->session()->exists('activeUser')) {
            return redirect('/');
        }
        return view('login.index');
    }

    /*
     * Action untuk proses login
     * Created by Budi Santoso
     * Params @username and @password
     */
    public function validateLogin(Request $request)
    {
        $username = $request->input('username');
        $password = sha1($request->input('password'));
        $activeUser = User::where(['user_username' => $username])->first();
        if(is_null($activeUser)){
            return "<div class='alert alert-danger'>Username tidak terdaftar</div>";
        }
        if($activeUser->user_password != $password){
            return "<div class='alert alert-danger'>Password salah</div>";
        }
        $request->session()->put('activeUser', $activeUser);
        return redirect('/');
    }
}