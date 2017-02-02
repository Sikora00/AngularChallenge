<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');

    }

    public function validate($data)
    {
        $validation = Validator::make($data, Product::$rules);

        if ($validation->passes()) {
            return true;
        }

        $this->errors = $validation->messages();
        return false;
    }


    public function get()
    {
        $products = Product::all();
        echo json_encode($products);
    }

    public function getLines()
    {
        $lines = DB::table('products')
            ->select('productLine')
            ->groupBy('productLine')
            ->get();

        echo json_encode($lines);
    }
    
    public function delete()
    {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        @$id = $request->id;
        Product::where('productCode', $id)->delete();
    }

    public function post()
    {
        $postdata = file_get_contents("php://input");
        $request = (array) json_decode($postdata);
        if($this->validate($request)) Product::create($request);
    }

    public function edytuj()
    {
        $postdata = file_get_contents("php://input");
        $request = (array) json_decode($postdata);
        if($this->validate($request))
        {
            Product::where('productCode', $request['productCode'])
                ->update($request);
        };
    }
}

