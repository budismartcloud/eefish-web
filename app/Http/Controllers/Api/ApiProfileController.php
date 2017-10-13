<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/27/2017
 * Time: 9:37 AM
 */
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Classes\AdditionalFunctionClass;

class ApiProfileController extends Controller
{

    /*
     * Action untuk proses ambil profile
     * Created by Budi Santoso
     * Params @username and @password
     */

    private $additionalFunction;

    public function __construct()
    {
        $this->additionalFunction = new AdditionalFunctionClass();
    }

    public function index($id)
    {
        $activeUser = User::find($id);

        if(is_null($activeUser)){
            $params = [
                'code' => 404,
                'description' => 'Not Found',
                'message' => 'Get profile Failed!',
                'data' => null
            ];
        }else{

            $data = [
                'id' => $activeUser->id,
                'username' => $activeUser->user_username,
                'identity_number' => $activeUser->user_identity_number,
                'address' => $activeUser->user_address,
                'post_code' => $activeUser->user_post_code,
                'picture' => 'http://192.168.43.135/eefish-web/public/uploads/pengguna'.$activeUser->user_picture,
                'city_id' => $activeUser->user_cities_id,
                'phone_number' => $activeUser->user_phone_number,
                'name' => $activeUser->user_full_name,
                'email' => $activeUser->user_email
            ];

            $params = [
                'code' => 302,
                'description' => 'Found',
                'message' => 'Get profile Success!',
                'data' => $data
            ];
        }


        return response()->json($params);
    }

}