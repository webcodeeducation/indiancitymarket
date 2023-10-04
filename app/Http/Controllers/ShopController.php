<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Validator;
use Session;
use Hash;
use Mail;
use Image;
use App\Users;
use App\Shops;
use App\Orders;
use App\Categories;
use App\Products;
use App\ShoppingProducts;
use App\AdCategory;
use App\Ads;
use App\JyantiShops;
use App\ShoppingCategory;
use App\ShoppingSubcategory;
use App\Subcategory;
use App\ShoppingShops;

class ShopController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
  public function __construct()
  {
    //$this->middleware('total');
  }

   public function index() {
    return view('shop.index');
   }
   public function home(Request $request){
    return view('shop.index');
   }
   public function addproduct(Request $request){
    return view('shop.addproduct');
   }
   public function doLogout(Request $request) {
      //return view('admin.index');
      $request->session()->flush();
      $request->session()->regenerate();
      return redirect()->action('HomeController@login');
      //return redirect()->back();
   }
  public function editshop(Request $request){
     $shop_id = \Request::segment(3);
      $shop = JyantiShops::where('id', '=', $shop_id)->first();
      return view('shop.editshop', ['shop_id'=>$shop->id,'shop'=>$shop]);
    }
   public function getdetailsDashboard(){
    $users = Users::count();
    $shops = Shops::count();
    $categories = Categories::count();
    $products = Products::count();
    return response()->json(['users'=>$users,'category'=>$categories,'subcategory'=>$shops, 'products'=>$products]);
   }
  public function showads(Request $request){
    //echo $value = session('user_id');
    //die();
    return view('shop.ads');
  }
  public function createproduct(){
    $data['title'] = 'Indiancitymarket &mdash; Create you new product within your choices category.';
    $data['categories'] = ShoppingCategory::where('isactive', 1)->get();
    //$data['subcategory'] = ShoppingSubcategory::all();
    return view('shop.productform')->with($data);
  }
  public function products() {
    $data['title'] = 'Indiancitymarket &mdash; Create you new product within choices directory.';
        $data['categories'] = ShoppingCategory::where('isactive', 1)->get();
        $data['subcategory'] = ShoppingSubcategory::all();
        return view('shop.productform')->with($data);
   }
     public function users() {
      return view('shop.users');
   }
   public function shops() {
      return view('shop.shops');
   }
   public function getUsers(){
   	$users1 = Users::all();
    return response()->json(['data'=>$users1]);
   }
   public function fetchallshops(){
   	$shops = Shops::all();
    return response()->json(['data'=>$shops]);
   }
  public function ourglobals() {
    $globals = DB::table('globals')->get();
      return view('admin.myglobals', ["globals"=>$globals]);
    }
    public function saveGlobals(Request $request){
      $params = array();
      parse_str($_POST['formdata'], $params);
      $home_txt = $params['home_txt'];
      $about_txt = $params['about_txt'];
      $vision_txt = $params['vision_txt'];

      $data = ['home_txt' => $home_txt,'about_txt' => $about_txt,'vision_txt' => $vision_txt];

      if(!isset($params['id']))
        {
            DB::table('globals')->insert($data);
            $msg = 'Settings added successfully';
        }else{
          DB::table('globals')
              ->where('id', $params['id'])
              ->update($data);
          $msg = 'Settings Updated successfully';
        }
    return response()->json(['msg' => $msg]);
    }

 	public function productForm() {
    return view('shop.productform');
   }
   public function sarasmelaproducts(Request $request){
    //return view('shop.saras_mela_products');
    $data = Session::all();
    ///echo 'test';
    //print_r($data);
    $id = Session::get('user_id');

    
    $user = Users::where('id', '=', $id)->first();
    $email = $user->email;
    //die();
    //$shop = JyantiShops::where('', '=', $email)->first();
    $shop = JyantiShops::where('shop_email', '=', $email)->first();
    return view('shop.editshop', ['shop_id'=>$shop->id,'shop'=>$shop]);
    //print_r($shop);
    //die();
    //return view('shop.editshop');
   }
    public function productedit(Request $request){
    $prod_id = \Request::segment(3);
    $product = DB::table('products')->where('id', $prod_id)->get();
    $category = DB::table('category')->get();
    $subcategory = DB::table('subcategory')->get();
    $productsCount = $product->count();
    return view('admin.edit', ['product'=> $product,'category'=>$category,'subcategory'=>$subcategory]);
   }

   public function ajaxRemoveUser(Request $request){
    //$input = $request->all();
    //return response()->json(['success'=>'Got Simple Ajax Request.']);

    $userid = $_POST['userid'];
    DB::table('users')->where('id', '=', $userid)->delete();
    return response()->json(['success'=>'Success','msg'=>'User Deleted Successfully.']);
   }
     public function removeCategory(Request $request){
    $catid = $_POST['catid'];
    DB::table('category')->where('id', '=', $catid)->delete();
    return response()->json(['success'=>'Success','msg'=>'Category Deleted Successfully.']);
   }
   public function removeSubcategory(Request $request){
    $subcatid = $_POST['subcatid'];
    DB::table('subcategory')->where('id', '=', $subcatid)->delete();
    return response()->json(['success'=>'Success','msg'=>'subcategory Deleted Successfully.']);
   }

   public function categories() {
        return view('admin.categories');
   }
      public function settings() {
        $contacts = DB::table('contacts')->get();
        return view('admin.settings', ["contacts"=>$contacts]);
   }
      public function getallcategories() {
    $cats = DB::table('category')->get();
    $html1 ='<select class="form-control changecategory" name="categoryname" >';
    $html1 .= '<option value="0">Select Category</option>';
    foreach ($cats as $key => $value) {
      $html1 .= '<option value="'.$value->id .'">' .$value->category_name .'</option>';
    }
    $html1 .= '</select>';
    return $html1;
   }
   public function selectedCategory(Request $request){
    $cat_id = $_POST['cat_id'];
    $subcats = DB::table('subcategory')->where('cat_id',$cat_id)->get();
    $html2 ='<select class="form-control" name="subcategoryname">';
    foreach ($subcats as $key => $value) {
      $html2 .= '<option value="'.$value->id .'">' .$value->subcat_name .'</option>';
    }
    $html2 .= '</select>';
    return $html2;
   }
    public function getallsubcategories() {
    $subcats = DB::table('subcategory')->get();
    $html2 ='<select class="form-control" name="subcategoryname">';
    $html2 .= '<option value="0">Select Category</option>';
    foreach ($subcats as $key => $value) {
      $html2 .= '<option value="'.$value->id .'">' .$value->subcat_name .'</option>';
    }
    $html2 .= '</select>';
    return $html2;
   }
   public function getAdCategories(){
    $subcats = AdCategory::all();
    $html2 ='<select class="form-control" name="cat_id">';
    $html2 .= '<option value="0">Select Category</option>';
    foreach ($subcats as $key => $value) {
      $html2 .= '<option value="'.$value->id .'">' .$value->ad_cat .'</option>';
    }
    $html2 .= '</select>';
    return $html2;
   }
   public function saveads(Request $request){
    //$data = $request->all();
    $image = $request->file('ad_image');
    $new_name = rand() . '.' . $image->getClientOriginalExtension();
    $image->move(public_path('/assets/images/ads'), $new_name);
    $ads = new Ads;
    $ads->ad_photo = $new_name;
    $ads->cat_id = $request->input('cat_id');
    $ads->ad_type = $request->input('ad_type');
    $ads->ad_title = $request->input('ad_title');
    $ads->ad_description = $request->input('ad_description');
    $ads->ad_price = $request->input('ad_price');
    $ads->ad_city = $request->input('ad_city');
    $ads->ad_tags = $request->input('ad_tags');
    $ads->emails = $request->input('emails');
    $ads->phone_number = $request->input('phone_number');
    $ads->save();
    return redirect()->back()->with('message', 'Your Ad has been registered!');
   }
   public function getAllAds(){
    $ads = Ads::all();
    return response()->json(['data'=>$ads]);
   }
   public function subcategories() {
    //$cat = App\Category::all();
    /*$cat = DB::table('Category')->get(); // it will get the entire table
      print_r($cat);
      die();*/
        return view('admin.subcategories');
   }
   public function activateCategory(Request $request){
    //$input = $request->all();
    $catid= $_POST['catid'];
    DB::table('category')->where('id',$catid)->update(['isactive' => 1]);
    return response()->json(['success'=>'Activated Category Successfully.']);
   }
   public function activateProduct(Request $request){
    //$input = $request->all();
    $prodid= $_POST['prodid'];
    DB::table('products')->where('id',$prodid)->update(['isactive' => 1]);
    return response()->json(['success'=>'Activated Product Successfully.']);
   }
   public function inactivateProduct(Request $request){
    //$input = $request->all();
    $prodid= $_POST['prodid'];
    DB::table('products')->where('id',$prodid)->update(['isactive' => 0]);
    return response()->json(['success'=>'Product InActive Successfully.']);
   }
    public function removeProduct(Request $request){
    //$input = $request->all();
    $prodid= $_POST['prodid'];
    DB::table('products')->where('id', '=', $prodid)->delete();
    return response()->json(['success'=>'Product Deleted Successfully.']);
   }
    public function inActivateCategory(Request $request){
    //$input = $request->all();
    $catid= $_POST['catid'];
    DB::table('category')->where('id',$catid)->update(['isactive' => 0]);
    return response()->json(['success'=>'InActive Category Successfully.']);
   }
   public function activateSubcategory(Request $request){
    //$input = $request->all();
    $catid= $_POST['catid'];
    DB::table('subcategory')->where('id',$catid)->update(['isactive' => 1]);
    return response()->json(['success'=>'Activated Category Successfully.']);
   }
   public function inActivateSubcategory(Request $request){
    //$input = $request->all();
    $catid= $_POST['catid'];
    DB::table('subcategory')->where('id',$catid)->update(['isactive' => 0]);
    return response()->json(['success'=>'Activated Category Successfully.']);
   }
   public function activateUser(Request $request){
    //$input = $request->all();
    $userid= $_POST['userid'];
    DB::table('users')->where('id',$userid)->update(['isactive' => 1]);
    return response()->json(['success'=>'Activated User Successfully.']);
   }
   public function inactivateUser(Request $request){
    //$input = $request->all();
    $userid= $_POST['userid'];
    DB::table('users')->where('id',$userid)->update(['isactive' => 0]);
    return response()->json(['success'=>'User InActive Successfully.']);
   }
   public function shop_profile() {
    $id= date('mdYHis');
    $session = session()->all();
    /*print_r($_POST);
    print_r($data);
    die();*/
    $user_id = $session['user_id'];
    //$shop = Shops::where('userid', $user_id)->first();
    //echo $id= uniqid();
    //echo str_random(3);
    //echo $shop_id = 'kkr' . mt_rand(1000000000, 9999999999); // better than rand()
    //$shops = Shops::where('shop_id', 'LIKE', '%'.$shop_id.'%')->get();
    //print_r($shop);
    //die();
        //return view('admin.profile');
    $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
    $data['shop'] = Shops::where('userid', $user_id)->first();
      return view('shop.profile')->with($data);
   }
   public function update_profile(Request $request){
    $session = session()->all();
    $user_id = $session['user_id'];
    $validator = Validator::make($request->all(), [
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            //'email' => 'required|max:100',
            'phone' => 'required|max:100',
            'shop_name' => 'required|max:100',
            'website' => 'required|max:100',
            'address' => 'required|max:100',
            'city' => 'required|max:50',
            'state' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            return redirect('/shop/profile')
                        ->withErrors($validator)
                        ->withInput();
        }

        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $phone = $request->input('phone');
        //$email = $request->input('email');
        $shop_name = $request->input('shop_name');
        $url = $request->input('website');
        $address = $request->input('address');
        $city = $request->input('city');
        $state = $request->input('state');

        $full_addres = $address . $city . $state;
        $shop_id = 'kkr' . $phone;

        $shop_data = array('shop_id'=>$shop_id, 'first_name'=>$first_name, 'last_name'=>$last_name,'shop_name'=>$shop_name,'mobile'=>$phone,'weburl'=>$url,'shop_address'=>$address, 'state'=>$state, 'city'=>$city);

        Shops::where('userid', $user_id)->update($shop_data);

        /*$usr = new Shops;
        $usr->email = $email;
        $usr->password = $password1;
        $usr->user_role = $role;
        $usr->save();*/

        //$data = array('email'=>$email, 'password'=>$password);

      /*Mail::send('templates.shop_registered_mail', $data, function ($message) use ($data) {
        $message->from('no-reply@indiancitymarket.com', 'Indiancitymarket');
        $message->subject('Thanks to Register: Indiancitymarket');
        $message->to($data['email']);
      });*/
        Session::flash('alert-success', "Profile Updated Successfully.");
        return redirect()->back();

   }
   public function savecategory(Request $request){
   		$name = $request->input('category');
        $image = $request->file('logo');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        
   		
        //$id = 10;
        //$post = Categories::where('id', $id);
		//$post->delete();

     $count = Categories::where('category_name', '=', $name)->count();
      if($count == 1){
        $msg = 'Category already Added. Please try another Category Name. Thankyou';
      }else{
      	$image->move(public_path('/assets/images/category'), $new_name);
        // create new user and save it
        $cat = new Categories;
        $cat->category_name = $name;
        $cat->category_image = $new_name;
        $cat->save();
        $msg = 'Category added successfully';
      }
      return redirect('admin/categories')->with('status', $msg);
   }
    public function saveUser(Request $request){
        // create new user and save it
        $params = array();
        parse_str($_POST['formdata'], $params);
        $name = $params['name'];
        $username = $params['username'];
        $email = $params['email'];
        $password = $params['password'];
        $password1 = bcrypt($password);
        $usr = new Users;
        $usr->name = $name;
        $usr->username = $username;
        $usr->email = $email;
        $usr->password = $password1;
        $usr->save();
        $msg = 'User added successfully';
        return response()->json(['msg' => $msg]);
  }

      public function saveContact(Request $request){
        // create new user and save it
        $params = array();
        parse_str($_POST['formdata'], $params);
        $website = $params['website'];
        $contact = $params['contact'];
        $phone = $params['phone'];
        $working_days = $params['working_days'];
        $email = $params['email'];
        $address = $params['address'];
        $facebook = $params['facebook'];
        $twitter = $params['twitter'];
        $whatsapp = $params['whatsapp'];
        $googleplus = $params['googleplus'];
        $data = ['website' => $website,'contact' => $contact,'phone' => $phone,'working_days' => $working_days,'email' => $email,'address' => $address,'facebook' => $facebook,'twitter' => $twitter,'whatsapp' => $whatsapp,'googleplus' => $googleplus];
        if(!isset($params['id']))
        {
            DB::table('contacts')->insert($data);
            $msg = 'Settings added successfully';
        }else{
          DB::table('contacts')
              ->where('id', $params['id'])
              ->update($data);
          $msg = 'Settings Updated successfully';
        }


        /*$cnt = new Contacts;
        $cnt->website = $website;
        $cnt->contact = $contact;
        $cnt->phone = $phone;
        $cnt->working_days = $working_days;
        $cnt->email = $email;
        $cnt->address = $address;
        $cnt->facebook = $facebook;
        $cnt->twitter = $twitter;
        $cnt->whatsapp = $whatsapp;
        $cnt->googleplus = $googleplus;
        $cnt->save();*/

        
        return response()->json(['msg' => $msg]);
  }

  public function saveProductImage(Request $request){
        //echo $name = $request->input('productid1');
        $image = $request->file('prodimage');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('/assets/images/products'), $new_name);
        //$this->updateProductImage($prodid);


       //return response()->json(['success'=>'done']);
  }
  public function updateProductImage($img_name){
    echo 'Image name: ' . $img_name;
  }

  public function saveProductEdit(Request $request){
  			$params = array();
        parse_str($_POST['formdata'], $params);
        $productid = $params['productid'];
        $main_category = $params['categoryname'];
        $subcategory = $params['subcategoryname'];
        $prod_type = $params['prod_type'];
        $prod_description = $params['prod_description'];
        $prod_volt = $params['prod_volt'];
        $prod_capacity = $params['prod_capacity'];
        $prod_dim_L5 = $params['prod_dim_L5'];
        $prod_dim_W5 = $params['prod_dim_W5'];
        $prod_dim_H5 = $params['prod_dim_H5'];
        $prod_current_start = $params['prod_current_start'];
        $prod_current_finish = $params['prod_current_finish'];
        $prod_weight_dry = $params['prod_weight_dry'];
        $prod_weight_filled = $params['prod_weight_filled'];
        $prod_qty_acid = $params['prod_qty_acid'];
        $data = ['main_category' => $main_category,'subcategory' => $subcategory,'prod_type' => $prod_type,'prod_description' => $prod_description,'prod_volt' => $prod_volt,'prod_capacity' => $prod_capacity,'prod_dim_L5' => $prod_dim_L5,'prod_dim_W5' => $prod_dim_W5,'prod_dim_H5' => $prod_dim_H5,'prod_current_start' => $prod_current_start,'prod_current_finish' => $prod_current_finish,'prod_weight_dry' => $prod_weight_dry,'prod_weight_filled' => $prod_weight_filled,'prod_qty_acid' => $prod_qty_acid];
        //print_r($data);
        DB::table('products')->where('id', $productid)->update($data);

        $msg = 'Product Updated successfully';
        return response()->json(['msg' => $msg]);
  }

  public function saveProduct(Request $request){
    //$userid = $request->session()->get('userid');

    $validator = Validator::make($request->all(), [
            'product_name' => 'required|max:255',
            'category' => 'required',
            'prod_image' => 'required',
            'product_quantity' => 'required',
            'product_weight' => 'required',
            'product_details' => 'required',
            'product_discount' => 'required',
            'product_alert' => 'required',
            //'product_stock' => 'required',
            'product_online' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/shop/product/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        $data = $request->all();
        $product_name = $request->input('product_name');
        $categoryname = $request->input('category');
        $available_quantity = $request->input('product_quantity');
        $product_weight = $request->input('product_weight');
        $product_description = $request->input('product_details');
        $percentage_discount = $request->input('product_discount');
        $stock_alert = $request->input('product_alert');
        //$stock_critical = $request->input('stock_critical');
        //$author = $request->input('author');
        //$comment = $request->input('comment');
        $image1 = $request->file('prod_image');
        $new_name1 = 'product_' . rand() . '.' . $image1->getClientOriginalExtension();
        $image1->move(public_path('/assets/images/products'), $new_name1);
        $user_id = session('user_id');

        $prod = new ShoppingProducts;
        $prod->shop_id = $user_id;
        $prod->category_id = 1;
        $prod->subcategory_id = $categoryname;
        
        $prod->product_image = $new_name1;
        $prod->product_name = $product_name;
        $prod->product_price = 100;
        $prod->product_ratings = 6;
        //$prod->prod_category = $categoryname;
        //$prod->prod_quantity = $available_quantity;
        //$prod->prod_weight = $product_weight;
        $prod->product_details = $product_description;
        //$prod->prod_discount = $percentage_discount;
        //$prod->prod_stock_alert = $stock_alert;
        //$prod->prod_stock_critical = $stock_critical;
        //$prod->author = $author;
        //$prod->comment = $comment;
        $prod->save();
        $msg = 'Product added successfully';
        return redirect('/shop/products')->with('status', $msg);
  }

   public function fetchCategories(){
    //$categories = DB::table('category')->get();
    $categories = Categories::all();
    return response()->json(["data" => $categories]);
   }
   public function getCategories(){
    //$categories = DB::table('category')->get();
    $categories = Categories::all();
    return response()->json(["data" => $categories]);
   }

   public function fetchallsubcategories(){
    $subcategories = DB::table('subcategory')->get();
    return response()->json(["data"=>$subcategories]);
   }
  public function fetchProducts(){
    //$products = App\Products::all();
    $products = DB::table('products')->get();
    return response()->json(["data"=>$products]);
   }
    public function fetchUsers(){
    $users = DB::table('users')->get();
      return response()->json(["data" => $users]);
   }
   public function saveSubcategory(Request $request){
    $params = array();
    parse_str($_POST['formdata'], $params);
    $cat_id = $params['categoryname'];
    $subcat = $params['category'];
        /*$sc = new Subcategory;
        $sc->cat_id = $cat_id;
        $sc->subcat_name = $subcat;
        $sc->save();
        $msg = 'Sub Category added successfully';
        return response()->json(['msg' => $msg]);*/

    DB::table('subcategory')->insert(['cat_id' => $cat_id,'subcat_name' => $subcat]);
     $msg = 'Sub Category added successfully';
    return response()->json(['msg' => $msg]);
   }

   public function sendEnquiry(Request $request){
  print_r($_POST);

  $params = array();
      parse_str($_POST['formdata'], $params);
      $name = $params['name'];
      $email = $params['email'];
      $city = $params['city'];
      $contact = $params['contact'];
     echo  $address = $params['address'];

      print_r($params);
      die();
  }
  public function saveAdCategory(Request $request){
  $name = $request->input('cat');
  $ad = new AdCategory();
  $ad->ad_cat = $name;
  $ad->save();
  $msg = 'Ad Category added successfully';
    return response()->json(['msg' => $msg]);
  }
  public function confirmorder(Request $request){
    //print_r($_POST);
    //die();
    //Session::flush();
    $data = $request->session()->all();
    $orderid = $request->input('orderid');
    $products = $request->input('products');
    $cname = $request->input('name');
    $mobile = $request->input('mobile');
    $landmarks = $request->input('landmarks');
    $town = $request->input('town');
    $landmark = $request->input('landmark');
    $shop_email = $request->input('shop');
    Session::put('orderid', $orderid);

    $data2 = [];

    $html1 ='<table border="1" cellpadding="10px" cellspacing="5px">';
    $html1 .= '<tr>';
      $html1 .= '<td><b>Product</b></td><td><b>Price</b></td>';
      $html1 .= '</tr>';
    foreach ($products as $key=>$value){
      $prod = explode('^', $value);
      $data2[] = [
        'Product' => strtoupper($prod[0]),
        'Amount' => $prod[1]
    ];
      $html1 .= '<tr>';
      $html1 .= '<td>'. strtoupper($prod[0]) . '</td><td><i style="font-size:16px" class="fa">&#xf156;</i> '. $prod[1]. '</td>';
      $html1 .= '</tr>';
    }
    $html1 .= '</table>';
    $json_data = json_encode($data2);

    $ord = new Orders;
    $ord->orderID = $orderid;
    $ord->cname = $cname;
    $ord->contact = $mobile;
    $ord->address = $landmarks;
    $ord->city = $town;
    $ord->lardmark = $landmark;
    $ord->products = $json_data;
    $ord->save();

    $data = array('name'=>$cname, 'mobile'=>$mobile,'semail'=>$shop_email, 'landmarks'=>$landmarks, 'town'=>$town, 'landmark'=>$landmark,'orderid'=>$orderid, 'html1'=>$html1);
    $emails1 = ['webcodeeducation@gmail.com', 'laxman091@gmail.com'];
    $emails = array("webcodeeducation@gmail.com", "laxman091@gmail.com");
      $result = Mail::send(['html'=>'templates.order_mail'], $data, function ($message) use ($data) {
        $message->from('no-reply@indiancitymarket.com', 'Indiancitymarket');
        $message->subject('Thanks to an Order: Indiancitymarket');
        $message->to($data['semail'])
        ->cc('orders@indiancitymarket.com')
        ->bcc('webcodeeducation@gmail.com');
      });

      // Laravel tells us exactly what email addresses failed, let's send back the first
      /*$fail = Mail::failures();
      if(!empty($fail)) throw new \Exception('Could not send message to '.$fail[0]);

      if(empty($result)) throw new \Exception('Email could not be sent.');*/
    return redirect('/thankyou');
      //die();
  }
  public function thankyou(){
    //echo 'thanks to an order on indiancitymarket';
    $data['orderid'] = Session::get('orderid'); // better than rand()
    $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        //$data['categories'] = Categories::where('isactive', 1)->get();
        //$data['cities'] = Cities::all();
        //$data['ads'] = Ads::where('isactive', 1)->limit(8)->get();
        return view('confirm_order')->with($data);
  }
  public function addToCart(Request $request){
    $id = $request->id;
    $product = ShoppingProducts::find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        $total = session()->get('total');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "productid" => $id,
                        "name" => $product->product_name,
                        "quantity" => 1,
                        "price" => $product->product_price,
                        "photo" => $product->product_image,
						            "type" =>'Unit'
                    ]
            ];
            session()->put('cart', $cart);
            session()->put('total', $total + $product->product_price);
            //return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            //return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "productid" => $id,
            "name" => $product->product_name,
            "quantity" => 1,
            "price" => $product->product_price,
            "photo" => $product->product_image,
			      "type" =>'Unit'
        ];
        session()->put('cart', $cart);
        session()->put('total', $total + $product->product_price);
        $response = 'Product Added';
        $cartitems = Session::get('cart');
        $cartCount = count($cartitems);
      return response()->json(['data'=>$response, 'total_items'=>$cartCount]);
  }
  
public function updateCart(Request $request)
    {
      //$product = ShoppingProducts::find($request->id);
        //print_r($_POST);
        //die(); 
        $cart = session()->get('cart');
        $total = session()->get('total');
        $cc = $cart[$request->id];
        $old_quantity = $cc['quantity'];
        //die();
        if($request->id and $request->quantity)
        {
          //$cart = session()->get('cart');
          $new_quantity = $request->quantity+1;
          //$new_quantity = $request->quantity;
          $product = ShoppingProducts::find($request->id);
          $price = $product->product_price * $new_quantity;
          $cart[$request->id]["quantity"] = $new_quantity;
          $cart[$request->id]["price"] = $price;
          session()->put('cart', $cart);
          session()->put('total', $total - $price);
          //$response['price'] = $price;
          //$response['data'] = 'Cart Updated';
          $arr = array('price'=>$price, 'data'=>'Cart Updated');
          echo json_encode($arr);
          //return response()->json($arr);
        }
    }

    public function fullupdateCart(Request $request)
    {
      //$product = ShoppingProducts::find($request->id);
        //print_r($_POST);
        //die(); 
        $cart = session()->get('cart');
        $total = session()->get('total');
        $cc = $cart[$request->id];
        $old_quantity = $cc['quantity'];
        if($request->id and $request->quantity)
        {
          //$cart = session()->get('cart');
          $new_quantity = $request->quantity;
          //$new_quantity = $request->quantity;
          $product = ShoppingProducts::find($request->id);
          $price = $product->product_price * $new_quantity;
          $cart[$request->id]["quantity"] = $new_quantity;
          $cart[$request->id]["price"] = $price;
          session()->put('cart', $cart);
          session()->put('total', $total - $price);
          //$response['price'] = $price;
          //$response['data'] = 'Cart Updated';
          $arr = array('quantity'=>$new_quantity,'price'=>$price, 'data'=>'Cart Updated');
          echo json_encode($arr);
          //return response()->json($arr);
        }
    }

    public function reduceCart(Request $request)
    {
      //$product = ShoppingProducts::find($request->id);
        //print_r($_POST);
        //die(); 
        $cart = session()->get('cart');
        $total = session()->get('total');
        $cc = $cart[$request->id];
        $old_quantity = $cc['quantity'];
        //die();
        if($request->id and $request->quantity)
        {
          //$cart = session()->get('cart');
          $product = ShoppingProducts::find($request->id);
          $new_quantity = $request->quantity-1;
          $price = $product->product_price * $new_quantity;
          $cart[$request->id]["quantity"] = $new_quantity;
          $cart[$request->id]["price"] = $price;
          session()->put('cart', $cart);
          session()->put('total', $total - $price);
          $price = $product->product_price * $new_quantity;
          $response = 'Cart Updated';
          $arr = array("price"=>$price, "data"=>"Cart Updated");
          echo json_encode($arr);
          //return response()->json(['data'=>$response, 'price'=>$price]);
        }
    }
	
	public function updateCartType(Request $request)
    {
        $cart = session()->get('cart');
        $cc = $cart[$request->id];
        $type = $cc['type'];
        if($request->id and $request->type)
        {
          //$cart = session()->get('cart');
          $cart[$request->id]["type"] = $request->type;
          session()->put('cart', $cart);
			    $response = 'Cart Updated';
			    return response()->json(['data'=>$response]);
          //session()->flash('success', 'Cart updated successfully');
          //return redirect()->back()->with('success', 'Cart updated successfully');
        }
    }
 
    public function removeCart(Request $request)
    {
        if($request->id) {
 
            $cart = session()->get('cart');
            $total = session()->get('total');
 
            if(isset($cart[$request->id])) {
 
                unset($cart[$request->id]);
                $price = $cart[$request->id]["price"];
                session()->put('total', $total - $price);
                session()->put('cart', $cart);
            }
 
            $response = 'Item Removed';
        }else {
          $response = 'Failed in Remove';
        }
        return response()->json(['data'=>$response, 'status'=>true]);
    }
    public function getShops(Request $request){
      $pincode = $request->pin;
      $shops = ShoppingShops::where('pincode', $pincode)->get();
        return response()->json(['data'=>$shops]);

        //$customers = UserDetails::where('featured', 1)->get();
      //return response()->json(['data' => $customers]);
    }
    public function getCart(Request $request){
      $cart = Session::get('cart');
        $total = 0;
        foreach($cart as $key1 => $item){
            $total = $total + $item['price'];
        }
        session()->put('total', $total);
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['cartitems'] = Session::get('cart');
        $data['cartCount'] = count($data['cartitems']);
        $data['shops'] = ShoppingShops::all();
        $data['products'] = ShoppingProducts::where('isactive', 0)->paginate(60);
        return view('cart')->with($data);
    }

  public function checkout(Request $request){
    //print_r($_POST);
    //die();
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['cartitems'] = Session::get('cart');
        $data['cartCount'] = count($data['cartitems']);
        $data['shops'] = ShoppingShops::all();
        $data['extra'] = $request->extra;
        $data['products'] = ShoppingProducts::where('isactive', 0)->paginate(60);
        //print_r($data['cartitems']);
        //die();
        return view('checkout')->with($data);
    }
	public function emptyCart(Request $request){
	if ($request->session()->has('users')) {
		  $request->session()->forget('cart');
		  $request->session()->flush();
	} 
		return redirect()->back()->with('success', 'Cart Empty successfully');
    }
    public function clearcart(Request $request){
      $request->session()->forget('cart');
      //echo "Cart items removed";
      return response()->json(['message'=>'Cart items removed']);
    }
	public function submitOrder(Request $request){
		$validator = Validator::make($request->all(), [
            'email' => 'required|max:100',
            'contact' => 'required|max:100',
            'address' => 'required|max:255',
            'shop_name' => 'required|max:100',
        ]);

        if ($validator->fails()) {
            return redirect('/cart')
                        ->withErrors($validator)
                        ->withInput();
        }
	$email = $request->email;
	$address = $request->address;
	$contact = $request->contact;
	$pincode = $request->pincode;
	$shop = $request->shop_name;
  	$extra = $request->extra;
  	$price = 0;
	$items = $request->session()->get('cart');
	$html = '<table class="table table-bordered" border="1">';
	$html.= '<tr><td>Product</td><td>Quantity</td><td>Type</td><td>Price</td></tr>';
	foreach($items as $key=>$value){
	$html.= '<tr>';
	$html.= '<td>' . $value['name'] . '</td>' . '<td>' . $value['quantity'] . '</td>' . '<td>' . $value['type'] . '</td>' . '<td>' . $value['price'] . '</td>';
	$html.= '</tr>';
	$price = $price + $value['price'];
	}
  $html.= '<tr><td colspan="1">Extra Thing</td><td colspan="3">' . $extra . '</td></tr>';
	$html.= '</table>';

	$fields = array(
			"sender_id" => "FSTSMS",
			"message" => "Thanks to an order on indiancitymarket.com. Total amount: " . $price,
			"language" => "english",
			"route" => "p",
			"numbers" => $contact,
		);

		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://www.fast2sms.com/dev/bulk",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_SSL_VERIFYHOST => 0,
		  CURLOPT_SSL_VERIFYPEER => 0,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => json_encode($fields),
		  CURLOPT_HTTPHEADER => array(
			"authorization: galJdUoRw8rMIcv0YTOnuKCWxQVZB1349sXGNjf7ihE5tDzeyFEaIFQquXvgHRdTiw5YrPAJ0bmn3O7C",
			"accept: */*",
			"cache-control: no-cache",
			"content-type: application/json"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);
        $data = array('email'=>$email,'address'=>$address,'contact'=>$contact,'pincode'=>$pincode,'shop'=>$shop,'html1'=>$html);

      Mail::send('templates.order_mail', $data, function ($message) use ($data) {
        $message->from('no-reply@indiancitymarket.com', 'Indiancitymarket');
        $message->subject('Thanks to an Order: Indiancitymarket');
        //$message->to($data['email']);
        $message->to('shashikantmishra075@gmail.com');
        $message->cc('shashikantmishra075@gmail.com');
      });
      Session::forget('cart');
      return Redirect::to('/');
		}
    public function select_city(Request $request){
      $city = $request->city;
      Session::put('city', $city);
      return redirect()->back();
    }
    public function getcartdetail(Request $request){
      $cart = Session::get('cart');
        $total = 0;
        $html = '<table border="1" class="table table-hover form-container">';
        $html .= '<tr><td>Name</td><td>quantity</td><td>type</td><td>price</td></tr>';
        foreach($cart as $key1 => $item){
          //$html .= '<tr><td>' . $item . '</td><td>' . $item. '</td><td>' .$item . '</td></tr>';
          $html.= '<tr>';
  $html.= '<td>' . $item['name'] . '</td>' . '<td>' . $item['quantity'] . '</td>' . '<td>' . $item['type'] . '</td>' . '<td>' . $item['price'] . '</td>';
  $html.= '</tr>';
        }
        $html .= '</table>';
        $html .= '<button type="button" class="btn cancel" onclick="closeForm()">Close</button>';
        echo $html;
    }
    public function updateItemPrice(Request $request){
        
        //print_r($_POST);
        //$id = $_POST['id'];
        /*//$cart = session()->get('cart');
        $total = session()->get('total');
        $cart = Session::get('cart');
        //$total = Session::get('total');
        $product = $cart[$id];
        //print_r($product);
        $quantity = $product['quantity'];
        //echo $price = $product['price'] + $_POST['price'];
        $new_total = $total + $product['price'];
        //Session::forget('total');
        //$cart[$id]['price'] = $price;
        $cart[$id]['quantity'] = $quantity + 1;
        session()->put('cart', $cart);
        //session()->put('total', $new_total);
        
        session()->put('total', $total + $product['price']);
        //Session::put('total', $new_total);
        //Session::put('total', $new_total);
        //echo 'updated price here';
        //print_r(Session::get('total'));*/
         $cart = session()->get('cart');
        $total = session()->get('total');
        $cc = $cart[$request->id];
        $old_quantity = $cc['quantity'];
        if($request->id and $request->quantity)
        {
          //$cart = session()->get('cart');
          $new_quantity = $request->quantity;
          //$new_quantity = $request->quantity;
          $product = ShoppingProducts::find($request->id);
          $price = $product->product_price * $new_quantity;
          $cart[$request->id]["quantity"] = $new_quantity;
          $cart[$request->id]["price"] = $price;
          session()->put('cart', $cart);
          session()->put('total', $total - $price);
          //$response['price'] = $price;
          //$response['data'] = 'Cart Updated';
          $arr = array('quantity'=>$new_quantity,'price'=>$price, 'data'=>'Cart Updated');
          echo json_encode($arr);
          //return response()->json($arr);
        }

    }
} // End Class
