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
use App\Models\FishItem;
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
        $fishes = Fish::orderBy('fish_name', 'ASC')->get();
        $data = [];
        foreach ($fishes as $num => $item)
        {
            $data[] = [
                'id' => $item->id,
                'name' => $item->fish_name,
                'category_id' => $item->fish_fish_categories_id,
                'category_name' => $item->getCategory->fish_category_name,
            ];
        }
        $params = [
            'code' => 302,
            'description' => 'Found',
            'message' => 'Get fish Success!',
            'data' => $data
        ];


        return response()->json($params);
    }

    /**********************************************************************************
    * API untuk mendapatkan ikan terfilter
    * @Author Budi
    */

    public function filtered(Request $request)
    {
        $category = $request->get('category');
        $fish = $request->get('fish');
        $size = $request->get('size');
        $data = [];

        if(!is_null($category) && !is_null($fish) && !is_null($size)){
            $dataFish = Fish::where(['fish_fish_categories_id' => $category])
                ->where(['id' => $fish])
                ->get();

            foreach ($dataFish as $num => $item)
            {
                foreach ($item->getItem as $no => $fishItem)
                {
                    if ($fishItem->fish_item_quantity > 0 && $fishItem->fish_item_fish_size_categories_id == $size){
                        $data[] = [
                            'fish_id' => $item->id,
                            'fish_name' => $item->fish_name,
                            'category_name' => $item->getCategory->fish_category_name,
                            'category_id' => $item->fish_fish_categories_id,
                            'variety_id' => $fishItem->id,
                            'variety_name' => $fishItem->fish_item_name,
                            'size_category_id' => $fishItem->fish_item_fish_size_categories_id,
                            'weight' => $fishItem->fish_item_weight,
                            'quantity' => $fishItem->fish_item_quantity,
                            'singular_price' => $fishItem->fish_item_specific_price,
                            'collective_price' => $fishItem->fish_item_normal_price
                        ];
                    }
                }
            }

        }elseif (!is_null($category) && !is_null($fish)){
            $dataFish = Fish::where(['fish_fish_categories_id' => $category])
                ->where(['id' => $fish])
                ->get();

            foreach ($dataFish as $num => $item)
            {
                foreach ($item->getItem as $no => $fishItem)
                {
                    if ($fishItem->fish_item_quantity > 0){
                        $data[] = [
                            'fish_id' => $item->id,
                            'fish_name' => $item->fish_name,
                            'category_name' => $item->getCategory->fish_category_name,
                            'category_id' => $item->fish_fish_categories_id,
                            'variety_id' => $fishItem->id,
                            'variety_name' => $fishItem->fish_item_name,
                            'weight' => $fishItem->fish_item_weight,
                            'quantity' => $fishItem->fish_item_quantity,
                            'singular_price' => $fishItem->fish_item_specific_price,
                            'collective_price' => $fishItem->fish_item_normal_price
                        ];
                    }
                }
            }
        }elseif (!is_null($category) && !is_null($size)){
            $dataFish = Fish::where(['fish_fish_categories_id' => $category])
                ->get();

            foreach ($dataFish as $num => $item)
            {
                foreach ($item->getItem as $no => $fishItem)
                {
                    if ($fishItem->fish_item_quantity > 0){
                        $data[] = [
                            'fish_id' => $item->id,
                            'fish_name' => $item->fish_name,
                            'category_name' => $item->getCategory->fish_category_name,
                            'category_id' => $item->fish_fish_categories_id,
                            'variety_id' => $fishItem->id,
                            'variety_name' => $fishItem->fish_item_name,
                            'weight' => $fishItem->fish_item_weight,
                            'quantity' => $fishItem->fish_item_quantity,
                            'singular_price' => $fishItem->fish_item_specific_price,
                            'collective_price' => $fishItem->fish_item_normal_price
                        ];
                    }
                }
            }
        }elseif (!is_null($fish) && !is_null($size)){
            $dataFish = FishItem::where('fish_item_quantity', '>', 0)
                ->where(['fish_item_fish_size_categories_id' => $size])
                ->where(['fish_item_fishes_id' => $fish])
                ->get();

            foreach ($dataFish as $num => $item){
                if ($item->fish_item_quantity > 0){
                    $data[] = [
                        'fish_id' => $item->getFish->id,
                        'fish_name' => $item->getFish->fish_name,
                        'category_name' => $item->getFish->getCategory->fish_category_name,
                        'category_id' => $item->getFish->fish_fish_categories_id,
                        'variety_id' => $item->id,
                        'variety_name' => $item->fish_item_name,
                        'weight' => $item->fish_item_weight,
                        'quantity' => $item->fish_item_quantity,
                        'singular_price' => $item->fish_item_specific_price,
                        'collective_price' => $item->fish_item_normal_price
                    ];
                }
            }

        }elseif (!is_null($category)){
            $dataFish = Fish::where(['fish_fish_categories_id' => $category])
                ->get();
            foreach ($dataFish as $num => $item)
            {
                foreach ($item->getItem as $no => $fishItem)
                {
                    if ($fishItem->fish_item_quantity > 0){
                        $data[] = [
                            'fish_id' => $item->id,
                            'fish_name' => $item->fish_name,
                            'category_name' => $item->getCategory->fish_category_name,
                            'category_id' => $item->fish_fish_categories_id,
                            'variety_id' => $fishItem->id,
                            'variety_name' => $fishItem->fish_item_name,
                            'weight' => $fishItem->fish_item_weight,
                            'quantity' => $fishItem->fish_item_quantity,
                            'singular_price' => $fishItem->fish_item_specific_price,
                            'collective_price' => $fishItem->fish_item_normal_price
                        ];
                    }
                }
            }
        }elseif (!is_null($fish)){
            $dataFish = FishItem::where('fish_item_quantity', '>', 0)
                ->where(['fish_item_fishes_id' => $fish])
                ->get();

            foreach ($dataFish as $num => $item){
                if ($item->fish_item_quantity > 0){
                    $data[] = [
                        'fish_id' => $item->getFish->id,
                        'fish_name' => $item->getFish->fish_name,
                        'category_name' => $item->getFish->getCategory->fish_category_name,
                        'category_id' => $item->getFish->fish_fish_categories_id,
                        'variety_id' => $item->id,
                        'variety_name' => $item->fish_item_name,
                        'weight' => $item->fish_item_weight,
                        'quantity' => $item->fish_item_quantity,
                        'singular_price' => $item->fish_item_specific_price,
                        'collective_price' => $item->fish_item_normal_price
                    ];
                }
            }
        }elseif (!is_null($size)){
            $dataFish = FishItem::where('fish_item_quantity', '>', 0)
                ->where(['fish_item_fish_size_categories_id' => $size])
                ->get();

            foreach ($dataFish as $num => $item){
                if ($item->fish_item_quantity > 0){
                    $data[] = [
                        'fish_id' => $item->getFish->id,
                        'fish_name' => $item->getFish->fish_name,
                        'category_name' => $item->getFish->getCategory->fish_category_name,
                        'category_id' => $item->getFish->fish_fish_categories_id,
                        'variety_id' => $item->id,
                        'variety_name' => $item->fish_item_name,
                        'weight' => $item->fish_item_weight,
                        'quantity' => $item->fish_item_quantity,
                        'singular_price' => $item->fish_item_specific_price,
                        'collective_price' => $item->fish_item_normal_price
                    ];
                }
            }
        }else{
            $dataFish = FishItem::where('fish_item_quantity', '>', 0)
                ->get();

            foreach ($dataFish as $num => $item){
                if ($item->fish_item_quantity > 0){
                    $data[] = [
                        'fish_id' => $item->getFish->id,
                        'fish_name' => $item->getFish->fish_name,
                        'category_name' => $item->getFish->getCategory->fish_category_name,
                        'category_id' => $item->getFish->fish_fish_categories_id,
                        'variety_id' => $item->id,
                        'variety_name' => $item->fish_item_name,
                        'weight' => $item->fish_item_weight,
                        'quantity' => $item->fish_item_quantity,
                        'singular_price' => $item->fish_item_specific_price,
                        'collective_price' => $item->fish_item_normal_price
                    ];
                }
            }
        }

        $params = [
            'code' => 302,
            'description' => 'Found',
            'message' => 'Get filtered fish Success!',
            'data' => $data
        ];


        return response()->json($params);

    }

}