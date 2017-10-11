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
use App\Models\FishCategory;
use App\Models\Fish;
use App\Classes\AdditionalFunctionClass;

class ApiIkanController extends Controller
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

    public function index()
    {
        $data = Fish::orderBy('fish_name', 'ASC')->get();

        $params = [
            'code' => 302,
            'description' => 'Found',
            'message' => 'Get fish Success!',
            'data' => $data
        ];


        return response()->json($params);
    }

}