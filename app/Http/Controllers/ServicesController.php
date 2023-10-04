<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Session;
use Hash;
use App\Countries;
use App\States;
use App\Cities;
use App\Users;
use App\Shops;
use App\Categories;
use App\ServicesCategory;
use App\ServicesSubcategory;
use App\ServicesShops;
use App\ServicesProducts;
use App\ServiceProperties;
use App\Ads;
use App\ServiceProviders;
use App\BookService;


class ServicesController extends Controller {

  public function __construct()
  {
    //$this->middleware('admin');
    // Redirect to under construction page
    //$this->middleware('underprocess');
  }

   public function index() {
    //echo 'Services Controller';
    $cat_name = \Request::segment(2);
    $pager = Categories::where('isactive', 1)->get();
    $category = Categories::where('category_name','=', $cat_name)->first();
    $categories = ServicesCategory::where('isactive', 1)->get();
    $subcategories = ServicesSubcategory::where('parent_cat_id','=', $category->id)->get();
    $ads = Ads::where('cat_id', '=', $category->id)->get();
    //print_r($subcategories);
    //die();
    return view('services_category.index', ['categories'=>$categories,'subcategories'=>$subcategories, 'ads'=>$ads,'pager'=>$pager]);
   }
   public function servicetype(Request $request){
    $cat_id = \Request::segment(3);
    $subcategories = ServicesSubcategory::where('parent_cat_id','=', $cat_id)->get();
    $ads = Ads::all();
    return view('services_category.subcategory', ['subcategories'=>$subcategories, 'ads'=>$ads]);
}
    public function subcategory_data(Request $request){   	
    $cat_id = \Request::segment(3);
    $subcategories = ServicesSubcategory::where('sub_cat_id','=', $cat_id)->get();
    $ads = Ads::all();
    //print_r($subcategories);
    //die();
    return view('services_category.subcategory', ['subcategories'=>$subcategories, 'ads'=>$ads]);
    }
    public function services_singleshop(Request $Request){
    //echo 'single shp';
    $shop_id = \Request::segment(3);
    //$slider = ShopSlider::where('shop_id','=', $shop_id)->first();
    $shop = ServicesShops::where('id','=', $shop_id)->first();
    $categories = $shop->product_categories;
    $cats = explode(",",$categories);
    $subcategories = ServicesSubcategory::whereIn('id', $cats)->get();
    $products = ServicesProducts::where('shop_id', $shop_id)->get();
    return view('services_category.shop', ['shop'=>$shop,'subcategories'=>$subcategories, 'products'=>$products]);
   }
   public function shop_product(Request $Request){
    //echo 'shop product';
    $prod_id = \Request::segment(4);
    $product = ServicesProducts::where('id', '=', $prod_id)->first();
    $shop_id = $product->shop_id;
    $shop = ServicesShops::where('id','=', $shop_id)->first();
    $subcategories = ServicesSubcategory::all();
    $ads = Ads::all();
    $offers = $product->product_offers;
    $offer = explode(",",$offers);
    return view('services_category.shop_product', ['shop'=>$shop,'ads'=>$ads,'subcategories'=>$subcategories, 'product'=>$product, 'offer'=>$offer]);
   }
    public function services_products(Request $request){
    //echo 'all product in shopping_category';
    $cat_name = \Request::segment(1);
    $category = Categories::where('category_name','=', $cat_name)->first();
    $subcategories = ServicesSubcategory::where('parent_cat_id','=', $category->id)->get();
    $products = ServicesProducts::where('category_id', $category->id)->get();
    return view('services_category.products', ['subcategories'=>$subcategories, 'products'=>$products]);
   }
    public function servicesshops(Request $request){
     $cat_name = \Request::segment(1);
    $category = Categories::where('category_name','=', $cat_name)->first();
    $subcategories = ServicesSubcategory::where('parent_cat_id','=', $category->id)->get();
    $shops = ServicesShops::where('category_id', $category->id)->get();
    return view('services_category.shops', ['subcategories'=>$subcategories, 'shops'=>$shops]);
   }
   public function services_property_type(Request $request){
    //echo 'show prorpty type';
    $property_type = \Request::segment(3);
    $property_id = \Request::segment(4);
    //$category = Categories::where('category_name','=', $cat_name)->first();
    $subcategories = ServicesSubcategory::where('isactive',1)->get();
    $services_property_type = ServiceProperties::where('property_type_id','=', $property_id)->get();
    //print_r($subcategories);
    //die();
    return view('services_category.services_property_type', ['service_type'=>$property_type,'subcategories'=>$subcategories, 'property_types'=>$services_property_type]);
   }
   public function register_service(){
    $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['cartitems'] = Session::get('cart');
        $data['cartCount'] = Session::get('cart');;
        $data['categories'] = ServicesSubcategory::where('isactive', 1)->get();
        $data['countries'] = Countries::all();
        $data['states'] = DB::select(DB::raw('select * from icm_states where country_id = 101')); // States::where('country_id ', 101)->get();
        //$data['ads'] = Ads::where('isactive', 1)->limit(8)->get();
        return view('register_service')->with($data);
   }
   public function details_service_provider(){
        $id = request()->segment(2);
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['categories'] = ServicesSubcategory::where('isactive', 1)->get();
        $data['serviceprovider'] = ServiceProviders::where('id', '=', $id)->first();
        $data['states'] = States::where('country_id', '=', 101)->get();
        return view('show_details_service_provider')->with($data);
   }
   public function bookservice(){
    print_r($_POST);
    die();
    $service = new BookService;
   }
 

}