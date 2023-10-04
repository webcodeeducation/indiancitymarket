<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Session;
use Hash;
use File;
use Auth;
use Mail;
use App\Countries;
use App\States;
use App\Cities;
use App\Categories;
use App\CityCategories;
use App\Subcategories;
use App\ChildSubcategories;
use App\Shops;
use App\JyantiShops;
use App\User;
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
use App\ShoppingShops;
use App\NewsCategory;
use App\ResaleProducts;
use App\News;
use App\ServiceCategories;
use App\ServiceProviders;
use App\ShoppingSubcategory;
use App\HomePhotos;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['cartitems'] = Session::get('cart');
        $data['cartCount'] = Session::get('cart');;
        $data['categories'] = ShoppingCategory::where('isactive', 1)->get();
        $data['cities'] = Cities::all();
        $data['ads'] = Ads::where('isactive', 1)->limit(8)->get();
        return view('index')->with($data);
    }
    public function home()
    {
        //$data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        //$data['categories'] = ShoppingCategory::where('isactive', 1)->get();
        //$data['cities'] = Cities::all();
        //$data['ads'] = Ads::where('isactive', 1)->limit(8)->get();
        //return view('home')->with($data);
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['cartitems'] = Session::get('cart');
        $data['cartCount'] = Session::get('cart');;
        $data['categories'] = ShoppingCategory::where('isactive', 1)->get();
        $data['cities'] = Cities::all();
        $data['ads'] = Ads::where('isactive', 1)->limit(8)->get();
        return view('index')->with($data);
    }
    public function search_ration_products(Request $request){
        //print_r($_POST);
        //die();
        $keyword = $request->input('keyword');
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['products'] = ShoppingProducts::where('product_name','LIKE','%'.$keyword.'%')->get();

        return view('ration_products')->with($data);
        //print_r($data['ration_products']);
    }
    public function category(Request $request){
        $cat = $request->input('type');
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        //$data['products'] = ShoppingProducts::where('category_id', '=', $cat)->get();	// working
        $data['products'] = ShoppingProducts::where('isactive', 1)->limit(60)->get();
        return view('products')->with($data);
    }
    public function showallproducts(Request $request){
        $cat = $request->input('type');
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['products'] = ShoppingProducts::where('isactive', 1)->limit(60)->get();
        return view('show_products')->with($data);
    }
    public function show_product_categorywise(){
        $cat_id = \Request::segment(2);
        //echo 'show product categorywise';
        $data['title'] = 'Indiancitymarket: India';
      $data['categories'] = ShoppingSubcategory::where('parent_cat_id',6)->get();
      //$data['products'] = ShoppingProducts::where('subcategory_id', $cat_id)->get();	// working
      $data['products'] = ShoppingProducts::where('isactive', 0)->limit(60)->get();
      //print_r($data['products']);
      //die();
      return view('show_products_categorywise')->with($data);
    }
    public function dosearch(Request $request){
        //print_r($request);
        //print_r($_GET);
        $search_string = $_GET['query'];
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['cartitems'] = Session::get('cart');
        $data['cartCount'] = count($data['cartitems']);
        $data['products'] = ShoppingProducts::where('product_name','LIKE','%'.$search_string.'%')
                ->orWhere('category_id','LIKE','%'.$search_string.'%')
                ->get();
        //print_r($data['products']);
        $data['categories'] = ShoppingSubcategory::where('parent_cat_id', 6)->get();
        return view('ration_products')->with($data);
    }
    public function showcheckout1(Request $request){
        $cat = $request->input('type');
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['orderid'] = mt_rand(1000000000, 9999999999);
        $data['products'] = ShoppingProducts::where('isactive', 1)->limit(60)->get();
        return view('checkout')->with($data);
    }
    public function showcheckout(Request $request){
        //echo 'checkout page';
        //die();
     $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        //$data['categories'] = Categories::where('isactive', 1)->get();
        $data['shops'] = Shops::all();
        //$data['ads'] = Ads::where('isactive', 1)->limit(8)->get();
     $data['orderid'] = mt_rand(1000000000, 9999999999);
     //return response()->view('checkout')->with($data);
        return view('checkout')->with($data);
    }
    public function showgrocery(){
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['cartCount'] = 123;
        $data['products'] = ShoppingProducts::where('isactive', 1)->limit(60)->get();
        return view('grocery')->with($data);
    }
    public function getoffer(){
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['cartCount'] = 123;
        $data['products'] = ShoppingProducts::where('isactive', 1)->limit(60)->get();
        return view('offer')->with($data); 
    }
    public function showration(){
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['cartCount'] = 123;
        $data['products'] = ShoppingProducts::where('isactive', 1)->limit(60)->get();
        return view('ration')->with($data);
    }
    public function fruits_vegetables(){
        //$data1 = Session::get('cart'); // Session::all();
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['cartitems'] = Session::get('cart');
        $data['cartCount'] = count($data['cartitems']);
        $data['products'] = ShoppingProducts::where('isactive', 0)->paginate(60);
        return view('fruits_vegetables')->with($data);   
    }
    public function ration_products(){
        //$data1 = Session::get('cart'); // Session::all();
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['cartitems'] = Session::get('cart');
        $data['cartCount'] = count($data['cartitems']);
        $data['products'] = ShoppingProducts::where('category_id', 'Ration')->paginate(60);
        $data['categories'] = ShoppingSubcategory::where('parent_cat_id', 6)->get();
        return view('ration_products')->with($data);   
    }
    public function new_home(){
        //$data1 = Session::get('cart'); // Session::all();
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['cartitems'] = Session::get('cart');
        $data['cartCount'] = count($data['cartitems']);
        $data['photos'] = HomePhotos::all();
        $data['categories'] = ShoppingSubcategory::where('parent_cat_id', 6)->get();
        return view('new_home')->with($data);   
    }
    public function ration_products_subcategory(Request $request){
        $cat_id = \Request::segment(2);
         $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['cartitems'] = Session::get('cart');
        $data['cartCount'] = count($data['cartitems']);
        //$data['products'] = ShoppingProducts::where('subcategory_id', $cat_id)->paginate(60);	// working
        $data['products'] = ShoppingProducts::where('isactive', 1)->limit(60)->get();
        $data['categories'] = ShoppingSubcategory::where('parent_cat_id', 6)->get();
        return view('ration_products_subcategory')->with($data);
    }
    public function sendmail(Request $request){
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $location = $request->location;
        $message = $request->message;
        //$data2 = [];

        $html1 ='<table border="1" cellpadding="10px" cellspacing="5px">';
          $html1 .= '<tr><td>Name:</td><td><i style="font-size:16px" class="fa">&#xf156;</i> '. $name. '</td></tr>';
          $html1 .= '<tr><td>Email:</td><td><i style="font-size:16px" class="fa">&#xf156;</i> '. $email. '</td></tr>';
          $html1 .= '<tr><td>Phone:</td><td><i style="font-size:16px" class="fa">&#xf156;</i> '. $phone. '</td></tr>';
          $html1 .= '<tr><td>Location:</td><td><i style="font-size:16px" class="fa">&#xf156;</i> '. $location. '</td></tr>';
          $html1 .= '<tr><td>Message:</td><td><i style="font-size:16px" class="fa">&#xf156;</i> '. $message. '</td></tr>';
        $html1 .= '</table>';


    $data = array('name'=>$cname, 'mobile'=>$phone,'email'=>$email, 'location'=>$location, 'landmark'=>$landmark,'message'=>$message, 'html1'=>$html1);
    $emails1 = ['shashikantmishra075@gmail.com'];
    $emails = array("shashikantmishra075@gmail.com");
      $result = Mail::send(['html'=>'templates.order_mail'], $data, function ($message) use ($data) {
        $message->from('no-reply@indiancitymarket.com', 'Indiancitymarket');
        $message->subject('Thanks to an Query: Indiancitymarket');
        $message->to('info@indiancitymarket.com')
        ->cc('shashikantmishra075@gmail.com')
        ->bcc('shashikantmishra075@gmail.com');
      });

      // Laravel tells us exactly what email addresses failed, let's send back the first
      /*$fail = Mail::failures();
      if(!empty($fail)) throw new \Exception('Could not send message to '.$fail[0]);

      if(empty($result)) throw new \Exception('Email could not be sent.');*/
    return redirect('/');
    }
    public function shopping(){
        //$categories = Categories::all();
        //return view('shopping');
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['categories'] = ShoppingCategory::where('isactive',1)->get();
        return view('shopping')->with($data);
    }
        public function services(){
         $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['categories'] = ServiceCategories::all();
        $data['providers'] = ServiceProviders::where('isactive',1)->paginate(30);
        //$data['cities'] = Cities::all();
        //$data['ads'] = Ads::where('isactive', 1)->limit(8)->get();
        return view('services')->with($data);
        //print_r($data['categories']);
    }
    public function shownews(){
        $categories = Categories::all();
        return view('shownews');
    }
    public function news(){
        //$categories = Categories::all();
        //return view('news');
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['categories'] = NewsCategory::where('isactive', 1)->get();
        //$data['cities'] = Cities::all();
        //$data['ads'] = Ads::where('isactive', 1)->limit(8)->get();
        return view('news')->with($data);
    }
    public function shownewscategory(){

        $id = request()->segment(2);
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['categories'] = NewsCategory::where('isactive', 1)->get();
        $data['news'] = News::where('news_category', '=', $id)->paginate(30);
        return view('shownewscategory')->with($data);
    }
    public function newsubcategory(){
        $id = request()->segment(2);
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['categories'] = NewsCategory::where('isactive', 1)->get();
        $data['news'] = News::where('id', '=', $id)->first();
        $userid = $data['news']->userid;
        $data['user'] =  User::find($userid);
        return view('newsubcategory')->with($data);
    }
    public function resalesubcategory(){
        $id = request()->segment(2);
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['categories'] = ResaleCategories::where('isactive', 1)->get();
        $data['products'] = ResaleProducts::where('category_id', '=', $id)->paginate(30);
        $userid = $data['product']->userid;
        $data['user'] =  User::find($userid);
        return view('resalesubcategory')->with($data);
    }

    public function showresalesubcategory(){
        $id = request()->segment(2);
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['categories'] = ResaleCategories::where('isactive', 1)->get();
        $data['product'] = ResaleProducts::where('id', '=', $id)->first();
        $userid = $data['product']->userid;
        $data['user'] =  User::find($userid);
        return view('showresalesubcategory')->with($data);
    }
    public function showresalecategory(){
        $id = request()->segment(3);
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['categories'] = ResaleCategories::where('isactive', 1)->get();
        $data['product'] = ResaleProducts::where('category_id', '=', $id)->first();
        $userid = $data['product']->userid;
        $data['user'] =  User::find($userid);
        return view('showresalecategory')->with($data);
    }
    public function postnews(){
    $userId = Auth::id();
     $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['categories'] = NewsCategory::where('isactive', 1)->get();
        //$data['states'] = States::where('country_id ', 101)->get();
        $data['states'] = DB::table('icm_states')->where('country_id', '101')->get();
        $data['news'] = News::where('userid', $userId)->get();
        return view('postnews')->with($data);
    }
    public function resale(){
        /*$data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['categories'] = ResaleCategories::where('isactive', 1)->get();
        return view('resale')->with($data);*/
        //$id = request()->segment(2);
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['categories'] = ResaleCategories::where('isactive', 1)->get();
        $data['products'] = ResaleProducts::where('isactive', 1)->paginate(30);
        //$userid = $data['products']->userid;
        //$data['user'] =  User::find($userid);
        return view('showresalecategory')->with($data);
    }
    public function getcities(Request $request){
        $id = $request->id;
        $cities = Cities::where('state_id', $id)->get();
        return response()->json($cities);
    }
    public function getRationSubcategories(Request $request){
        $id = $request->id;
        $categories = ShoppingSubcategory::where(['parent_cat_id' => $id,'isactive' => 1])->get();
        return response()->json($categories);        
    }
    public function getstates(Request $request){
        $id = $request->id;
        $states = States::where('country_id', $id)->get();
        return response()->json($states);
    }
    public function postresaleproduct(){
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['categories'] = ResaleCategories::all();
        return view('resale_form')->with($data);
    }
    public function contact(){
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        //$data['categories'] = Categories::where('isactive', 1)->get();
        //$data['cities'] = Cities::all();
        //$data['ads'] = Ads::where('isactive', 1)->limit(8)->get();
        return view('contact')->with($data);
        //return view('contact');
    }
    public function getcartdetails(){
        $cart = Session::get('cart');
        $total = 0;
        $html = '<table class="table table-bordered">';
        foreach($cart as $key1 => $item){
            $path = "http://indiancitymarket.com/public/assets/images/products/" . $item['photo'];
            $html .= "<tr><td><img src='". $path."'width='50px' height='50px'/></td><td>'".$item['name']."'</td><td>'".$item['quantity']."'</td><td>'".$item['price']."'</td></tr>";
        }

        $html .= '</table>';
        echo $html;
    }
    public function register_customer(Request $request){
        $user = $request->input('user');
        $view_name = 'register_' . $user;
        return view('register_customer');
    }
    public function register_shop(Request $request){
        $user = $request->input('user');
        $view_name = 'register_' . $user;
        return view('register_shop');
    }
    public function register_geeta_shop(Request $request){
        return view('register_geeta_shop');
    }
    public function doRegisterShop(){
        $params = array();
        parse_str($_POST['formdata'], $params);
        $shopname = $params['shopname'];
        $mobile = $params['mobile'];
        $address = $params['address'];
        $country = $params['country'];
        $state = $params['state'];
        $city = $params['city'];
        $pincode = $params['pincode'];
        $username = $params['username'];
        $email = $params['email'];
        $password = $params['password'];

        $password1 = bcrypt($password);
        $usr = new User;
        $usr->name = $shopname;
        $usr->username = $username;
        $usr->email = $email;
        $usr->password = $password1;
        $usr->save();
        $insertedId = $usr->id;
        $temp_id = '1001' . $insertedId; 

        $shop = new Shops;
        $shop->userid = $insertedId;
        $shop->shopid = $temp_id;
        $shop->shop_type = $shopname;
        $shop->shop_name = $shopname;
        $shop->phone = $mobile;
        $shop->shop_address = $address;
        $shop->shop_city = $city;
        $shop->pincode = $pincode;
        $shop->save();
        $msg = 'Shop added successfully';
        return response()->json(['msg' => $msg]);

    }
    public function submit_offer(Request $request){
        //print_r($_POST);
        //die();
        $email = $request->email;
        $contact = $request->contact;
        $pincode = $request->pincode;
        $address = $request->address;
        $data = array('email'=>$email, 'contact'=>$contact, 'pincode'=>$pincode,'address'=>$address);
      Mail::send('templates.offer_order_mail', $data, function ($message) use ($data) {
            $message->from('no-reply@indiancitymarket.com');
            $message->subject('Shop Offer Order');
            $message->to('shashikantmishra075@gmail.com');
            $message->cc('shashikantmishra075@gmail.com');
        });
            $msg = 'Offer Generated Successfully';
        //}
        Session::flash('alert-success', $msg);
        return redirect()->back();
    }
    public function vuejscart(){
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        //$data['cartitems'] = Session::get('cart');
        //$data['cartCount'] = Session::get('cart');;
        //$data['categories'] = ShoppingCategory::where('isactive', 1)->get();
        //$data['cities'] = Cities::all();
        //$data['ads'] = Ads::where('isactive', 1)->limit(8)->get();
        return view('vuejscart')->with($data);        
    }
    public function fetchAllDatavuejsdata(){
        $cart = Session::get('cart');
        $data = array();
        foreach($cart as $key1 => $item){
            $data[] = $item;
        }
        //header('Content-Type: application/json');
        //echo json_encode($data);
        return response()->json($data);
    }
    public function submitserviceprovider(Request $request){
        //print_r($_POST);
        //die();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phone' => 'required',
            'service_provider_type' => 'required',
            'service_provider_category' => 'required',
            'logo' => 'required',
            'year_establishment' => 'required',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required'
        ]);
        if ($validator->fails()) {
                return redirect('/serviceprovider/add')
                        ->withErrors($validator)
                        ->withInput();
        }

        $logo = $request->file('logo');
        $photoname = rand() . '.' . $request->logo->getClientOriginalExtension();
        $destinationPath = public_path('/assets/images/providers');
        $logo->move($destinationPath, $photoname);        
        //$user = User::create(request(['name','phone', 'email','role', 'password']));
        $password1 = bcrypt($request->password);
        $user = new User;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->role = 5;
        $user->password = $password1;
        $user->save();

        $country = Countries::find(1)->name;
        $state = States::find(1)->name;
        $city = Cities::find(1)->name;

        $provider = new ServiceProviders;
        $provider->Organization_Name = $request->name;
        $provider->Location = $city;
        $provider->Categories_offered = $request->service_provider_category;
        $provider->service_provider_type = $request->service_provider_type;
        $provider->service_provider_category = $request->service_provider_category;
        $provider->company_desc = $request->company_desc;
        $provider->logo = $photoname;
        $provider->year_establishment = $request->year_establishment;
        $provider->country = $country;
        $provider->state = $state;
        $provider->city = $city;
        $provider->Posted_by = $request->name;
        $provider->save();
        
        Session::flash('alert-success', 'Service Provider Added Successfully.');
        
        return redirect()->to('/serviceprovider/add');
    }
    public function submitresaleproduct(Request $request){
        
        

        //$image = $request->file('small');
        /*$fileName = null;
    if (request()->hasFile('small')) {
        $file = $request()->file('small');
        $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
        $file->move('/assets/resale', $fileName);    
    }*/


            $validator = Validator::make($request->all(), [
            'small' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'category' => 'required',
            'manufacturer' => 'required',
            'price' => 'required',
            'summary' => 'required',
        ]);
            if ($validator->fails()) {
                return redirect('/postresaleproduct')
                        ->withErrors($validator)
                        ->withInput();
                        //echo 'Error happened';
        }
        $name = $request->name;
        $category = $request->category;
        $manufacturer = $request->manufacturer;
        $SKU = $request->SKU;
        $price = $request->price;
        $offers = $request->offers;

        $colors = $request->colors;
        $size = $request->size;
        $seller = $request->seller;
        $Published = $request->Published;
        $Featured = $request->Featured;

        $small = $request->file('small');
        $medium = $request->file('medium');
        $large = $request->file('large');

        //$shop_logo_image = $request->file('small');
        //$new_name1 = rand() . '.' . $shop_logo_image->getClientOriginalExtension();
        //$shop_logo_image->move(public_path('/assets/resale'), $new_name1);

        $summary = $request->summary;
        $relatedProducts = $request->relatedProducts;
        $upsellProducts = $request->upsellProducts;
        $requiredProducts = $request->requiredProducts;
        $upsellProductDiscount = $request->upsellProductDiscount;

        
        //$new_name = rand() . '.' . $small->getClientOriginalExtension();
        $small_name = rand() . '.' . $request->small->getClientOriginalExtension();
        $medium_name = rand() . '.' . $request->medium->getClientOriginalExtension();
        $large_name = rand() . '.' . $request->large->getClientOriginalExtension();

        $small->move(public_path('/assets/resale'), $small_name);
        $medium->move(public_path('/assets/resale'), $medium_name);
        $large->move(public_path('/assets/resale'), $large_name);

        $images = $small_name . ',' . $medium_name . ',' . $large_name;
        $shop = new ResaleProducts;
        $shop->category_id = $category;
        $shop->userid = Auth::id();
        $shop->product_images = $images;
        $shop->product_name = $name;
        $shop->product_manufacturer = $manufacturer;
        $shop->product_SKU = $SKU;
        $shop->product_price = $price;
        $shop->product_offers = $offers;
        $shop->product_colors = $colors;
        $shop->product_sizes = $size;
        $shop->product_seller = $seller;
        $shop->product_details = $summary;
        $shop->save();
        $msg = 'Resale product added successfully';
        Session::flash('alert-success', $msg);
        return redirect()->back();
    }
    public function dopayment(){
            // Make Post Fields Array
            $data1 = [
                'api_key' => 'rzp_test_L4oSEXlHdSbzXr',
                'name' => 'Test Customer',
                'contact' => '7888405066',
                'email'=>   'developer@gmail.com',
                'fail_existing' => '0',
                'gstin' =>  '29XAbbA4369J1PA',
                'notes' => 'this is extra information'
            ];

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.razorpay.com/v1/customers",
                'headers' => [
                'Authorization' => 'Basic rzp_test_L4oSEXlHdSbzXr',
                ],
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30000,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => json_encode($data1),
                CURLOPT_HTTPHEADER => array(
                    // Set here requred headers
                    "api_key: rzp_test_L4oSEXlHdSbzXr",
                    "accept: */*",
                    "accept-language: en-US,en;q=0.8",
                    "content-type: application/json",
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
                echo "cURL Error #:" . $err;
            } else {
                print_r(json_decode($response));
            }
    }
}
