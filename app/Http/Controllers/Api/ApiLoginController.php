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

class ApiLoginController extends Controller
{

    /*
     * Action untuk proses login
     * Created by Budi Santoso
     * Params @username and @password
     */

    private $additionalFunction;

    public function __construct()
    {
        $this->additionalFunction = new AdditionalFunctionClass();
    }

    public function validateLogin(Request $request)
    {
        $apiName = "VALIDATE_LOGIN";
        $username = $request->input('username');
        $password = sha1($request->input('password'));

        $sendingParams = [
            'username' => $username,
            'password' => $password
        ];

        if(is_null($username)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter username!", json_encode($sendingParams) );
        }

        $activeUser = User::where(['user_username' => $username])->first();
        if(is_null($activeUser)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Username not found!", json_encode($sendingParams) );
        }

        if($activeUser->user_password != $password){
            return $this->additionalFunction->returnApiMessage($apiName, 401, "Password not match!", json_encode($sendingParams) );
        }

        $activeUser->user_last_login = date("Y-m-d H:i:s");
        $activeUser->save();

        $data = [
            'id' => $activeUser->id,
            'username' => $activeUser->user_username,
            'identity_number' => $activeUser->user_identity_number,
            'address' => $activeUser->user_address,
            'post_code' => $activeUser->user_post_code,
            'picture' => 'http://localhost/eefish-web/public/uploads/pengguna'.$activeUser->user_picture,
            'city_id' => $activeUser->user_cities_id,
            'phone_number' => $activeUser->user_phone_number,
            'name' => $activeUser->user_full_name,
            'email' => $activeUser->user_email
        ];

        $params = [
            'code' => 302,
            'description' => 'Found',
            'message' => 'Login Success!',
            'data' => $data
        ];


        return response()->json($params);

    }
}