<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 9/27/2017
 * Time: 8:05 AM
 */

namespace App\Classes;
use App\Models\MessageSystem;
use App\Models\ApiLog;

class AdditionalFunctionClass
{
    public function getMessage($code)
    {
        $data = MessageSystem::where(['message_system_code' => $code])->first();
        return $data;
    }

    public function returnApiMessage($apiName, $code, $description, $params)
    {
        $data = new ApiLog();
        $data->api_log_name = $apiName;
        $data->api_log_description = $description;
        $data->api_log_error_code = $code;
        $data->api_log_param = $params;
        $data->save();

        /** Generate return **/
        $messageSystem = $this->getMessage($code);
        if(!is_null($messageSystem)){
            $params = [
                'code' => $messageSystem->message_system_code,
                'description' => $messageSystem->message_system_description,
                'message' => $description
            ];
        }else{
            $params = [
                'code' => 00,
                'description' => "Message system unavailable",
                'message' => $description
            ];
        }

        return response()->json($params);


    }
}