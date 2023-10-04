<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Session;
use Hash;
use App\Users;
use App\Shops;
use App\Categories;
use App\ResaleCategory;
use App\ResaleSubcategory;
use App\ResaleProducts;
use App\ResaleAds;
use App\Products;
use App\AdCategory;
use App\Ads;


class ResaleController extends Controller {

  public function __construct()
  {
    //$this->middleware('admin');
    // Redirect to under construction page
    //$this->middleware('underprocess');
  }

   public function index() {
    $cat_name = \Request::segment(2);
    $pager = Categories::where('isactive', 1)->get();
    $category = Categories::where('category_name','=', $cat_name)->first();
    $categories = ResaleCategory::where('isactive', 1)->get();
    $products = ResaleProducts::where('isactive', 1)->get();
    $ads = Ads::where('cat_id', '=', $category->id)->get();
    return view('resale_category.index', ['categories'=>$categories, 'products'=>$products, 'ads'=>$ads,'pager'=>$pager]);
   }
   public function resaletype(Request $request){
   	$cat_id = \Request::segment(3);
    $subcategories = ResaleSubcategory::where('parent_cat_id','=', $cat_id)->get();
    $products = ResaleProducts::where('subcategory_id', '=', $cat_id)->get();
    $ads = Ads::all();
    return view('resale_category.subcategory', ['subcategories'=>$subcategories, 'products'=>$products, 'ads'=>$ads]);
   }
   public function show_product(Request $request){
   	//echo 'shop product';
    $prod_id = \Request::segment(3);
    $product = ResaleProducts::where('id', '=', $prod_id)->first();
    $subcategories = ResaleSubcategory::all();
    $ads = Ads::all();
    $offers = $product->product_offers;
    $offer = explode(",",$offers);
    //print_r($offer);
    //die();
    return view('resale_category.show_product', ['ads'=>$ads,'subcategories'=>$subcategories, 'product'=>$product, 'offer'=>$offer]);
   }
    public function resaleproducts(Request $request){
    //echo 'all product in shopping_category';
    $cat_name = \Request::segment(1);
    //die();
    $category = Categories::where('category_name','=', $cat_name)->first();
    //$cat_id = \Request::segment(3);
    $subcategories = ResaleSubcategory::where('parent_cat_id','=', $category->id)->get();
    $products = ResaleProducts::where('category_id', $category->id)->get();
    return view('resale_category.products', ['subcategories'=>$subcategories, 'products'=>$products]);
   }
   public function resaleads(Request $request){
    //echo 'all ads in shopping_category';
    $cat_name = \Request::segment(1);
    $category = Categories::where('category_name','=', $cat_name)->first();
    //$cat_id = \Request::segment(3);
    $subcategories = ResaleSubcategory::where('parent_cat_id','=', $category->id)->get();
    $products = ResaleAds::where('cat_id', $category->id)->get();
    return view('resale_category.ads', ['subcategories'=>$subcategories, 'products'=>$products]);
   }

}