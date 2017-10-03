<?php
/**
 * Created by Budi Santoso.
 * User: User
 * Date: 9/27/2017
 * Time: 9:31 AM
 */
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function index(Request $request){
        if ($request->session()->exists('activeUser')) {
            return view('backend.dashboard.index');
        }else{
            return redirect('login');
        }
    }
}