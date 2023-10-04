<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Hash;
use Mail;
use File;
use Image;
use App\Categories;
use App\CityCategories;
use App\Subcategories;
use App\ChildSubcategories;
use App\Cities;
use App\Shops;
use App\JyantiShops;
use App\Users;
use App\Customers;
use App\Roles;
use App\Products;
use App\Ads;
use App\ShopCategory;
use App\ShoppingCategory;
use App\ShoppingProducts;
use App\ResaleCategories;
use App\CityImages;
use App\Tracker;
use App\JyantiShopProducts;

class SuperAdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('superadmin.index');
    }
    public function addproduct(){
    	$data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['categories'] = ShoppingCategory::where('isactive', 1)->get();
        $data['cities'] = Cities::all();
        $data['ads'] = Ads::where('isactive', 1)->limit(8)->get();
        return view('superadmin.productform')->with($data);
    }
    public function submitproductnew(Request $request){
    	$validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_category' => 'required',
            //'product_subcategory' => 'required',
            'product_name' => 'required',
            'product_price' => 'required',
            'product_description' => 'required',
            'percentage_discount' => 'required',
        ]);
            if ($validator->fails()) {
                return redirect('/superadmin/addproduct')
                        ->withErrors($validator)
                        ->withInput();
        }

        $product_category = $request->input('product_category');
        $product_subcategory = $request->input('product_subcategory');
        $product_name = $request->input('product_name');
        $product_price = $request->input('product_price');
        $product_description = $request->input('product_description');
        $percentage_discount = $request->input('percentage_discount');
 
        if ($files = $request->file('image')) {
            
            $fileName =  "prod_".time().'.'.$request->image->getClientOriginalExtension();
            //$request->image->storeAs('public/assets/images', $fileName);
            $destinationPath = public_path('/assets/images');
        	$request->image->move($destinationPath, $fileName);
            $prod = new ShoppingProducts;
            $prod->category_id = $product_category;
            $prod->subcategory_id = $product_subcategory;
            $prod->product_image = $fileName;
            $prod->product_name = $product_name;
            $prod->product_price = $product_price;
            $prod->product_offers = $percentage_discount;
            $prod->save();

            Session::flash('alert-success', "Product Added Successfully.");
            return redirect()->back();

            /*return Response()->json([
                "image" => $fileName
            ], Response::HTTP_OK);*/
 
        }
    }
}
