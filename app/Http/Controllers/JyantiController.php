<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Session;
use App\Categories;
use App\Users;
use App\JyantiShops;
use App\JyantiShopProducts;
use App\JyantiAds;


class JyantiController extends Controller {
  public function __construct()
  {
    //$this->middleware('admin');
  }
  public function index(Request $request){
        //$JyantiShops = JyantiShops::where('isactive', 1)->limit(10)->get();
    //$JyantiShops = JyantiShops::where('isactive', 1)->get();
    //return view('geeta_jyanti.index', ['shops'=>$JyantiShops]);
    $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
    $data['shops'] = JyantiShops::where('isactive', 1)->paginate(100);
    //print_r($data['shops']);
    //die();
    return view('geeta_jyanti.index')->with($data);
    }
   public function shop_details(Request $request) {
   		/*$shop_id = \Request::segment(3);
      $shop = JyantiShops::where('id','=', $shop_id)->first();
      $products = JyantiShopProducts::where('shop_id','=', $shop_id)->get();
      return view('geeta_jyanti.shop_detail_page', ['shop'=>$shop,'products'=>$products]);*/
      $id = \Request::segment(3);
      //$check = JyantiShops::where('id', '=', $id)->first();
      $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['categories'] = Categories::where('isactive', 1)->get();
        $data['shop'] = JyantiShops::where('id', '=', $id)->first();
        return view('geeta_jyanti.shop_detail_page')->with($data);
    
    /*if ($check) {
        // found it
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['categories'] = Categories::where('isactive', 1)->get();
        $data['shop'] = JyantiShops::where('id', '=', $id)->first();
        return view('geeta_jyanti.shop_detail_page')->with($data);
    } else {
        // not found
      $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
      $data['categories'] = Categories::where('isactive', 1)->get();
      print_r($data);
      die();
        return view('not-found-data-view')->with($data);;
    }*/
   }
   public function addCart(Request $request)
    {
    	echo $request->input('shop_id');
    	echo $request->input('product_id');
    	echo 'order items details';
    	print_r($_POST);
    	die();
    }
      public function fetchalljyantishops(){
    $shops = JyantiShops::all();
    return response()->json(['data'=>$shops]);
   }
    public function submitorder(Request $request){
        $data = Session::all();
        $user_id = $data['user_id'];
        $shop_id = $request->input('shop_id');
        $product_id = $request->input('product_id');
        $prod_qty = $request->input('prod_qty');

        $cart = new ShoppingCart;
        $cart->userid = $user_id;
        $cart->shop_id = $shop_id;
        $cart->product_id = $product_id;
        $cart->product_qty = $prod_qty;
        $cart->cart_total = 1000;
        $cart->save();
        $ordernumber = '#' . str_pad($user_id, 8, "0", STR_PAD_LEFT);
        //return redirect()->route('thankyou', ['orderid' => $ordernumber ]);
        return redirect()->action('OrderController@thankyou', ['ordernumber' => $ordernumber]);
    }
    public function add_jyanti_product(Request $request){
      $shop_id = \Request::segment(3);
      $shop = JyantiShops::where('id','=', $shop_id)->first();
        //print_r($shop);
        return view('shop.addjyantishop_product', ['shop'=>$shop]);

    }
    public function thankyou(Request $request){
    	return view('thankyou');
    }
    public function show_map(){
      return view('geeta_jyanti.show_map');
    }
    public function show_programs(){
      return view('geeta_jyanti.show_programs');
    }
    public function show_jyanti_offers(Request $request){
    	$shops = JyantiAds::all();
    	return view('geeta_jyanti.show_jyanti_offers', ['shops'=>$shops]);
    }

    public function show_shopkeeper_photos(Request $request){
      $users = Users::where('user_role','=', 3)->get();
      return view('geeta_jyanti.show_shopkeeper_photos', ['users'=>$users]);
    }
    public function show_shop_images(Request $request){
      $shops = JyantiShops::where('isactive', 1)->paginate(200);
      return view('geeta_jyanti.show_shop_images', ['shops'=>$shops]);
    }


}