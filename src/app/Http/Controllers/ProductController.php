<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public static $products = [
        ["id"=>"1", "name"=>"TV", "description"=>"Best TV", "price"=>"1000"],
        ["id"=>"2", "name"=>"iPhone", "description"=>"Best iPhone", "price"=>"1"],
        ["id"=>"3", "name"=>"Chromecast", "description"=>"Best Chromecast", "price"=>"3"],
        ["id"=>"4", "name"=>"Glasses", "description"=>"Best Glasses", "price"=>"1"]
    ];

    public function index(): View
    {
        $viewData = [];
        $viewData["title"] = "Products - Online Store";
        $viewData["subtitle"] =  "List of products";
        $viewData["products"] = ProductController::$products;
        return view('product.index')->with("viewData", $viewData);
    }

    public function show(string $id) : View|RedirectResponse
    {
        if($id > count(ProductController::$products)){
            return redirect()->route('home.index');
        }
        $viewData = [];
        $product = ProductController::$products[$id-1];
        $viewData["title"] = $product["name"]." - Online Store";
        $viewData["subtitle"] =  $product["name"]." - Product information";
        $viewData["price"] = "Price:";
        $viewData["product"] = $product;
        return view('product.show')->with("viewData", $viewData);
    }

    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData["title"] = "Create product";

        return view('product.create')->with("viewData",$viewData);
    }

    public function save(Request $request): Response|RedirectResponse
    {
        $request->validate([
            "name" => "required",
            "price" => "required|gt:0",
        ]);
        
        
    }

    public function created(Request $request) 
    {
        $viewData["title"] = "Project Created";
        
        return view('product.create')->with("viewData",$viewData);
    }
}
