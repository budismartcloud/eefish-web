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

class ApiRegisterController extends Controller
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

    public function register(Request $request)
    {
        $apiName = "REGISTER";
        $username = $request->input('username');
        $password = $request->input('password');
        $identityNumber = $request->input('identity_number');
        $address = $request->input('address');
        $phoneNumber = $request->input('phone_number');
        $name = $request->input('name');
        $email = $request->input('email');
        $postCode = $request->input('postcode');

        $sendingParams = [
            'username' => $username,
            'password' => $password,
            'identity_number' => $identityNumber,
            'address' => $address,
            'phone_number' => $phoneNumber,
            'name' => $name,
            'email' => $email,
            'postcode' => $postCode
        ];

        if(is_null($username)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter username!", json_encode($sendingParams) );
        }

        if(is_null($password)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter password!", json_encode($sendingParams) );
        }


        if(is_null($identityNumber)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter identity_number!", json_encode($sendingParams) );
        }


        if(is_null($address)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter address!", json_encode($sendingParams) );
        }


        if(is_null($phoneNumber)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter phone_number!", json_encode($sendingParams) );
        }


        if(is_null($name)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter name!", json_encode($sendingParams) );
        }


        if(is_null($email)){
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter email!", json_encode($sendingParams) );
        }

        if(is_null($postCode))
        {
            return $this->additionalFunction->returnApiMessage($apiName, 404, "Missing required parameter postcode!", json_encode($sendingParams) );
        }

        $activeUser = User::where(['user_username' => $username])->first();
        if(!is_null($activeUser)){
            return $this->additionalFunction->returnApiMessage($apiName, 403, "Username already used!", json_encode($sendingParams) );
        }

        $data = new User();
        $data->user_username = $username;
        $data->user_password = sha1($password);
        $data->user_identity_number = $identityNumber;
        $data->user_address = $address;
        $data->user_cities_id = 2;
        $data->user_phone_number = $phoneNumber;
        $data->user_full_name = $name;
        $data->user_email = $email;
        $data->user_post_code = $postCode;

        try{
            $data->save();
            $params = [
                'code' => 302,
                'description' => 'Found',
                'message' => 'Registration success!',
            ];

            return response()->json($params);
        }catch (\Exception $e){
            return $this->additionalFunction->returnApiMessage($apiName, 403, "Registration failed!", json_encode($sendingParams) );
        }

    }
}