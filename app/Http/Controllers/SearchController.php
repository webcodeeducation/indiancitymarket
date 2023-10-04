<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Session;
use Hash;
use App\Categories;
use App\ShoppingCategory;
use App\ShoppingSubcategory;
use App\ShoppingProducts;
use App\ResaleProducts;//ResaleProducts
use App\ShoppingShops;
use App\ShoppingAds;
use App\Shops;
use App\ShopSlider;
use App\Ads;
use App\NewsCategory;
use App\AdCategory;
use App\Videos;
use App\News;


class SearchController extends Controller {

  public function __construct()
  {
    //$this->middleware('admin');
   // Redirect to under construction page
    //return redirect('/underconstruction');
  }
    public function index(Request $request){
        //echo 'testing search';
        //print_r($_GET);
        $query = $_GET['query'];
        $location = $_GET['location'];
        $category = $_GET['category'];

        
        /*$products1 = ShoppingProducts::where('category_id','=', $category)->get();
        $products2 = ResaleProducts::where('id','=', $category)->get();
        $Ads = Ads::where('cat_id','=', $category)->get();*/
        //print_r($products1);
        //die();
        //$cat_name = \Request::segment(2);
        //$category = Categories::where('id','=', $category)->first();
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['categories'] = Categories::where('isactive', 1)->get();
        $data['shopping_products'] = ShoppingProducts::where('category_id','=', $category)->paginate(20);
        $data['resale_products'] = ResaleProducts::where('id','=', $category)->paginate(20);
        $data['ads'] = Ads::where('cat_id','=', $category)->paginate(20);
        //print_r($data);
        //die();
        return view('search_results')->with($data);

        //$query = $request->input('location');
        //$city_name = $request->search;
        
        //$city_name = 'Kurukshetra';
        /*$city = Cities::where('city_name', '=', $city_name)->first();
        $matchThese = ['isactive' => '1', 'city_id' => $city->id];
        $city_categories = CityCategories::where($matchThese)->get();
        $city_images = CityImages::where('city_id','=', $city->id)->get();
        $categories = Categories::where('isactive', 1)->get();
        $ads = Ads::all();*/
        /*$catCount = $city_categories->count();
        //print_r($city_categories);
        //die();
        if($catCount > 0){
            return view('city', ["categories"=>$categories, "city_categories"=>$city_categories ,'ads'=>$ads,'city'=>$city]);
        }else{
            return view('nosearch', ["categories"=>$categories, 'ads'=>$ads,'city'=>$city]);
        }*/
        
    }
   

}