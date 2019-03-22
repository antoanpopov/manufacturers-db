<?php


namespace App\Http\Controllers\Vendors\Vali;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ValiController extends Controller
{

    public function categories()
    {

        $categories = [];

        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request("GET", "https://www.vali.bg/api/v1/categories", [
                "headers" => [
                    "Accept" => "application/json",
                    "Authorization" => "Bearer " . env("VALI_API_KEY")
                ]
            ]);

            $categories = json_decode($response->getBody()->getContents());

        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

        return view('vendors.vali.index')->with(['categories' => $categories]);
    }

    public function manufacturers()
    {

        $API_KEY = "J5qgv4YnmKF4C3oqf4ef5e30TIhQNrzgLseim3Qa9o7y0PBT772t2RgsXQLV";

        $manufacturers = [];


        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->request("GET", "https://www.vali.bg/api/v1/manufacturers", [
                "headers" => [
                    "Accept" => "application/json",
                    "Authorization" => "Bearer " . env("VALI_API_KEY")
                ]
            ]);

            $manufacturers = json_decode($response->getBody()->getContents());

        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

        return view('vendors.vali.manufacturers')->with(['manufacturers' => $manufacturers]);
    }

    public function searchParametersByCategoryId(Request $request)
    {

        $input = $request->input("category_id");
        $errors = null;
        $parameters = [];
        $request->flash();

        if($input && $input !== ""){
            try {
                $client = new \GuzzleHttp\Client();
                $response = $client->request("GET", "https://www.vali.bg/api/v1/parameters/$input", [
                    "headers" => [
                        "Accept" => "application/json",
                        "Authorization" => "Bearer " . env("VALI_API_KEY")
                    ]
                ]);

                $parameters = json_decode($response->getBody()->getContents());

            } catch (\Exception $exception) {
                $errors = $exception->getMessage();
            }
        }

        $view = view('vendors.vali.search_parameters_by_category_id')
            ->with(['parameters' => $parameters]);

        if($errors){
            $view->withErrors($errors);
        }

        return $view;
    }

    public function searchByProductId(Request $request)
    {

        $input = $request->input("product_id");
        $errors = null;
        $productData = [];
        $request->flash();

        if($input && $input !== ""){
            try {
                $client = new \GuzzleHttp\Client();
                $response = $client->request("GET", "https://www.vali.bg/api/v1/product/$input", [
                    "headers" => [
                        "Accept" => "application/json",
                        "Authorization" => "Bearer " . env("VALI_API_KEY")
                    ]
                ]);

                $productData = json_decode($response->getBody()->getContents());

            } catch (\Exception $exception) {
                $errors = $exception->getMessage();
            }
        }

        $view = view('vendors.vali.search_by_product_id')
            ->with(['productData' => $productData]);

        if($errors){
            $view->withErrors($errors);
        }

        return $view;
    }
}
