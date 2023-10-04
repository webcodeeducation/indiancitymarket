<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Session;
use Hash;
use Mail;
use File;
use App\Users;
use App\Customers;
use App\Shops;
use App\Categories;
use App\Products;
use App\ServiceCategories;
use App\ResaleCategory;
use App\ResaleCategories;
use App\NewsCategories;
use App\FungameCategories;
use App\News;
use App\Photos;
use App\Videos;

class CustomerController extends Controller {

  //protected $request;

    public function __construct() {
        //$this->request = $request;
        //$this->middleware('admin');
    }

   public function index() {
      if (Session::has('user_id') && Session::has('user_name')){
      // do some thing if the key is exist
        $categories = Categories::where('isactive', 1)->get();
        $id = Session::get('user_id');
        $user = Users::where('id','=', $id)->first();
        return view('customer.index', ['categories'=>$categories, 'user'=>$user]);
    }else{
      //return redirect()->action('HomeController@login');
    }
   }
   public function createshop(){
    $id = Session::get('user_id');
    $user = Users::where('id','=', $id)->first();
    $customer = Customers::where('userid','=', $id)->first();
    //print_r($customer);
    //die();
   	$categories = Categories::where('isactive', 1)->get();
        return view('customer.create_shop', ["categories"=>$categories,'user'=>$user,'customer'=>$customer,'user'=>$user]);
        //return view('customer.delete_shop', ["categories"=>$categories,'user'=>$user,'customer'=>$customer]);
   }
   public function createservice(){
    $id = Session::get('user_id');
    $user = Users::where('id','=', $id)->first();
   	$categories = Categories::where('isactive', 1)->get();
    return view('customer.create_service', ["categories"=>$categories, 'user'=>$user]);
   }
   public function createresale(){
   	$categories = Categories::where('isactive', 1)->get();
   	    return view('customer.create_resale', ["categories"=>$categories]);
   }
    public function createnews(){
      $id = Session::get('user_id');
    $user = Users::where('id','=', $id)->first();
   	$categories = Categories::where('isactive', 1)->get();
    $newscategories = NewsCategories::where('isactive', 1)->get();
   	//return view('customer.create_news', ["categories"=>$categories]);
    return view('customer.create_news2', ["categories"=>$categories,'newscategories'=>$newscategories, 'user'=>$user]);
   }

    public function createfungame(){
    $id = Session::get('user_id');    
   	//$categories = Categories::where('isactive', 1)->get();
    $user = Users::where('id','=', $id)->first();
    
    $photo = Photos::where('user_id', '=', $id)->first();
    $video = Videos::where('user_id','=', $id)->first();
    /*print_r($photo);
    print_r($video);
    die();*/
    $user_photos = explode(',',$photo->photo_image);
    return view('customer.create_fungame', ['user'=>$user,'photo'=>$user_photos, 'video'=>$video]);    
   }
   public function getServiceCategories(){
   	$servicecategories = ServiceCategories::all();
    $html2 ='<select class="form-control" name="service_category">';
    $html2 .= '<option value="0">Select Category</option>';
    foreach ($servicecategories as $key => $value) {
      $html2 .= '<option value="'.$value->id .'">' .$value->service_cat_name .'</option>';
    }
    $html2 .= '</select>';
    return $html2;
   }
   public function getResaleCategories(){
   	$categories = ResaleCategory::all();
    $html2 ='<select class="form-control" name="service_category">';
    $html2 .= '<option value="0">Select Category</option>';
    foreach ($categories as $key => $value) {
      $html2 .= '<option value="'.$value->id .'">' .$value->resale_cat_name .'</option>';
    }
    $html2 .= '</select>';
    return $html2;
   }
   public function getNewsCategories(){
   	$categories = NewsCategories::all();
    $html2 ='<select class="form-control" name="news_category">';
    $html2 .= '<option value="0">Select Category</option>';
    foreach ($categories as $key => $value) {
      $html2 .= '<option value="'.$value->id .'">' .$value->news_cat_name .'</option>';
    }
    $html2 .= '</select>';
    return $html2;
   }
   public function getFungameCategories(){
   	$categories = FungameCategories::all();
    $html2 ='<select class="form-control" name="news_category">';
    $html2 .= '<option value="0">Select Category</option>';
    foreach ($categories as $key => $value) {
      $html2 .= '<option value="'.$value->id .'">' .$value->fungame_cat_name .'</option>';
    }
    $html2 .= '</select>';
    return $html2;
   }
   public function saveServiceCategory(Request $request){
   	$cat_name = $request->input('cat_name');
   	$count = ServiceCategories::where('service_cat_name', '=', $cat_name)->count();
      if($count == 1){
        $msg = 'Category already Added. Please try another Category Name. Thankyou';
      }else{
        // create new user and save it
        $cat = new ServiceCategories;
        $cat->service_cat_name = $cat_name;
        $cat->save();
        $msg = 'Category added successfully';
      }
      return response()->json(['msg'=>$msg]);
   }
   public function saveResaleCategory(Request $request){
   	$cat_name = $request->input('cat_name');
   	$count = ResaleCategory::where('resale_cat_name', '=', $cat_name)->count();
      if($count == 1){
        $msg = 'Category already Added. Please try another Category Name. Thankyou';
      }else{
        // create new user and save it
        $cat = new ResaleCategories;
        $cat->resale_cat_name = $cat_name;
        $cat->save();
        $msg = 'Category added successfully';
      }
      return response()->json(['msg'=>$msg]);
   }
   public function doLogout(Request $request) {
        //return view('admin.index');
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->action('HomeController@login');
        //return redirect()->back();
   }
   public function getdetailsDashboard(Request $request){
    $id = Session::get('user_id');
    $likes = Photos::where('user_id',  $id)->first();
    //$likes_no = $likes->photo_likes;
    //$likes = Photos::where('user_id',  $id)->get();
    //$shops = Shops::count();
    //$categories = Categories::count();
    //$products = Products::count();
    return response()->json(['likes'=>100,'category'=>123,'subcategory'=>123,  'products'=>220]);
   }
  public function showads(Request $request){
    return view('shop.ads');
  }
  public function products() {
      return view('shop.productform');
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
   public function subcategories() {
    //$cat = App\Category::all();
    /*$cat = DB::table('Category')->get(); // it will get the entire table
      print_r($cat);
      die();*/
        return view('admin.subcategories');
   }
   public function activateCategory(Request $request){
    $catid= $_POST['catid'];
    DB::table('category')->where('id',$catid)->update(['isactive' => 1]);
    return response()->json(['success'=>'Activated Category Successfully.']);
   }
   public function activateProduct(Request $request){
    $prodid= $_POST['prodid'];
    DB::table('products')->where('id',$prodid)->update(['isactive' => 1]);
    return response()->json(['success'=>'Activated Product Successfully.']);
   }
   public function inactivateProduct(Request $request){
    $prodid= $_POST['prodid'];
    DB::table('products')->where('id',$prodid)->update(['isactive' => 0]);
    return response()->json(['success'=>'Product InActive Successfully.']);
   }
    public function removeProduct(Request $request){
    $prodid= $_POST['prodid'];
    DB::table('products')->where('id', '=', $prodid)->delete();
    return response()->json(['success'=>'Product Deleted Successfully.']);
   }
    public function inActivateCategory(Request $request){
    $catid= $_POST['catid'];
    DB::table('category')->where('id',$catid)->update(['isactive' => 0]);
    return response()->json(['success'=>'InActive Category Successfully.']);
   }
   public function activateSubcategory(Request $request){
    $catid= $_POST['catid'];
    DB::table('subcategory')->where('id',$catid)->update(['isactive' => 1]);
    return response()->json(['success'=>'Activated Category Successfully.']);
   }
   public function inActivateSubcategory(Request $request){
    $catid= $_POST['catid'];
    DB::table('subcategory')->where('id',$catid)->update(['isactive' => 0]);
    return response()->json(['success'=>'Activated Category Successfully.']);
   }
   public function activateUser(Request $request){
    $userid= $_POST['userid'];
    DB::table('users')->where('id',$userid)->update(['isactive' => 1]);
    return response()->json(['success'=>'Activated User Successfully.']);
   }
   public function inactivateUser(Request $request){
    $userid= $_POST['userid'];
    DB::table('users')->where('id',$userid)->update(['isactive' => 0]);
    return response()->json(['success'=>'User InActive Successfully.']);
   }
   public function profile() {
        return view('admin.profile');
   }
   public function savecategory(Request $request){
   		$name = $request->input('category');
        $image = $request->file('logo');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
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
        $data = $request->all();
        $product_name = $request->input('product_name');
        $categoryname = $request->input('categoryname');
        $available_quantity = $request->input('available_quantity');
        $product_weight = $request->input('product_weight');
        $product_description = $request->input('product_description');
        $percentage_discount = $request->input('percentage_discount');
        $stock_alert = $request->input('stock_alert');
        $stock_critical = $request->input('stock_critical');
        $author = $request->input('author');
        $comment = $request->input('comment');
        $image1 = $request->file('prod_image');
        $image2 = $request->file('prod_aux_image');
        $new_name1 = rand() . '.' . $image1->getClientOriginalExtension();
        $new_name2 = rand() . '.' . $image2->getClientOriginalExtension();
        $image1->move(public_path('/assets/images/products'), $new_name1);
        $image2->move(public_path('/assets/images/products'), $new_name2);
        $user_id = session('user_id');

        // Retrieve the first model matching the query constraints...
        $shopdata = Shops::where('userid', 1)->get();
        $shop_id = $shopdata->shopid;
        $prod = new Products;
        $prod->shop_id = $shop_id;
        $prod->prod_image = $new_name1;
        $prod->aux_image = $new_name2;
        $prod->prod_name = $product_name;
        $prod->prod_category = $categoryname;
        $prod->prod_quantity = $available_quantity;
        $prod->prod_weight = $product_weight;
        $prod->prod_description = $product_description;
        $prod->prod_discount = $percentage_discount;
        $prod->prod_stock_alert = $stock_alert;
        $prod->prod_stock_critical = $stock_critical;
        $prod->author = $author;
        $prod->comment = $comment;
        $prod->save();
        $msg = 'Product added successfully';
        return redirect('/shop/products')->with('status', $msg);
        //return response()->json(['msg' => $msg]);
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

  $params = array();
      parse_str($_POST['formdata'], $params);
      $name = $params['name'];
      $email = $params['email'];
      $city = $params['city'];
      $contact = $params['contact'];
     echo  $address = $params['address'];
}
public function getProfile(Request $request){
	$id = Session::get('user_id');
  $user = Users::where('id','=', $id)->first();
	return view('customer.profile', ['user'=>$user]);
}
  public function registershop(Request $request){
    $number = mt_rand(1000000000, 9999999999); // better than rand()
    $positive = abs($number);
    $name = $request->input('shopname');
    $address = $request->input('address');
    $id = Session::get('user_id');
    $user = Users::where('id','=', $id)->first();
    //$find = Customers::where('shop_id','=', $positive)->first();
    Customers::where('userid', '=', $id)->update(['shop_id' => $positive,'cust_address'=>$address]);
    $customer = Customers::where('userid','=', $id)->first();
      $shop = new Shops;
      $shop->userid = $id;
      $shop->shopid = $positive;
      $shop->shop_name = $name;
      $shop->phone = $customer->mobile;
      $shop->shop_address = $address;
      $shop->shop_city = $customer->city;
      $shop->pincode = $customer->pincode;
      $shop->save();
      $data = array('name'=>$name, 'email' =>$user->email,'customer_id' =>$customer->cust_id, 'shop_id'=>$positive);
   
      Mail::send(['text'=>'templates.shop_registered_mail'], $data, function($message) {
         $message->to('laxman091@gmail.com', 'Indian City Market')->subject('Shop Subscription Email');
         $message->from('sales@indiancitymarket.com','Indian City Market');
         $message->cc('shashikantmishra075@gmail.com','Indian City Market');
      });
    return redirect()->back();
  }
    public function postnews123(Request $request){
      echo 'testing 123';
          print_r($request);
    die();
    /*$number = mt_rand(1000000000, 9999999999); // better than rand()
    $positive = abs($number);
    $name = $request->input('shopname');
    $address = $request->input('address');
    $id = Session::get('user_id');
    $user = Users::where('id','=', $id)->first();
    //$find = Customers::where('shop_id','=', $positive)->first();
    Customers::where('userid', '=', $id)->update(['shop_id' => $positive,'cust_address'=>$address]);
    $customer = Customers::where('userid','=', $id)->first();
      $shop = new Shops;
      $shop->userid = $id;
      $shop->shopid = $positive;
      $shop->shop_name = $name;
      $shop->phone = $customer->mobile;
      $shop->shop_address = $address;
      $shop->shop_city = $customer->city;
      $shop->pincode = $customer->pincode;
      $shop->save();
      $data = array('name'=>$name, 'email' =>$user->email,'customer_id' =>$customer->cust_id, 'shop_id'=>$positive);
   
      Mail::send(['text'=>'templates.shop_registered_mail'], $data, function($message) {
         $message->to('laxman091@gmail.com', 'Indian City Market')->subject('Shop Subscription Email');
         $message->from('sales@indiancitymarket.com','Indian City Market');
         $message->cc('shashikantmishra075@gmail.com','Indian City Market');
      });*/
    //return redirect()->back();
  }
  public function postnews(Request $request){
        $id = Session::get('user_id');
        $category = $request->input('news_category');
        $title = $request->input('news_title');
        $image = $request->file('header');
        $news_data = $request->input('news');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('/assets/images/news'), $new_name);
        // create new user and save it
        $news = new News;
        $news->userid = $id;
        $news->news_category = $category;
        $news->news_header = $new_name;
        $news->news_title = $title;
        $news->news_desc = $news_data;
        $news->save();
        //$msg = 'News Posted Successfully';
        Session::flash('success', "News Posted Successfully.");
        //return redirect('/customer/news/create')->with('success', $msg);   
        return redirect()->back();
  }
  public function photolike(Request $request){
    $id = $request->input('photoid');
    $userid = Session::get('user_id');
    $find = Photos::where('id','=', $id)->first();
    $count = $find->photo_likes + 1;
    Photos::where('id', '=', $id)->update(['photo_likes' => $count]);
    $msg = 'Thanks to Like Fungame Photo.';
    return response()->json(['msg'=>$msg]);
  }
  public function photodislike(Request $request){
    $id = $request->input('photoid');
    $userid = Session::get('user_id');
    $find = Photos::where('id','=', $id)->first();
    $count = $find->photo_likes - 1;
    Photos::where('id', '=', $id)->update(['photo_likes' => $count]);
    $msg = 'Dislike Submitted.';
    return response()->json(['msg'=>$msg]);
  }
  public function savephoto(Request $request){
        $id = Session::get('user_id');
        $images=array();
        $title = $request->input('photo_title');
        $files = $request->file('fungame_photo');
        $single = $request->input('single');
        $groups = $request->input('groups');
        //$places = $single . ',' . $groups;
        
            if (Photos::where('user_id', '=', $id)->count() > 0) {
              // user found
              Session::flash('alert-warning', "Photo Already Uploaded.");
              }
            else{
                // create new user and save it
              if($files=$request->file('fungame_photo')){
                foreach($files as $file){
                //$name=$file->getClientOriginalName();
                $new_name = rand() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('/assets/images/fungame/photos'), $new_name);
                $images[]=$new_name;
                    }
                }
              
        $photo = new Photos;
        $photo->user_id = $id;
        $photo->photo_image = implode(",",$images);
        $photo->cat_id = 13;
        $photo->photo_single = $single;
        $photo->photo_groups = $groups;
        $photo->photo_title = $title;
        $photo->photo_tags = 'tags';
        $photo->save();
        Session::flash('alert-success', "Photo Uploaded Successfully.");
            }
            return redirect()->back();
  }
    public function savevideo(Request $request){
        $id = Session::get('user_id');
        $title = $request->input('video_title');
            $video = $request->file('fungame_video');
            $new_name = rand() . '.' . $video->getClientOriginalExtension();
            if (Videos::where('user_id', '=', $id)->count() > 0) {
              // user found
              Session::flash('alert-warning', "Video Already Uploaded.");
              }
            else{
            $video->move(public_path('/assets/images/fungame/videos'), $new_name);
            // create new user and save it
            $video = new Videos;
            $video->user_id = $id;
            $video->video_filename = $new_name;
            $video->cat_id = 13;
            $video->video_title = $title;
            $video->video_tags = 'tags';
            $video->save();
            Session::flash('alert-success', "Video Uploaded Successfully.");
            }   
            return redirect()->back();        
  }
  public function deletephoto(Request $request){
    $id = Session::get('user_id');
    
    /*$deletedRows = Photos::where('userid', '=', $id)->first();
    echo $deletedRows->count();
    die();
    if($deletedRows->count() === 1){
          $destinationPath = public_path('/assets/images/fungame/photos');
          File::delete($destinationPath.'/'. $deletedRows->photo_image);
          Session::flash('alert-danger', "Photo deleted successfully.");
    }else{

    }

    return redirect()->back();*/
  }
  public function deletevideo(Request $request){

  }
  public function updateprofile(Request $request){
    $id = Session::get('user_id');
    $image = $request->file('profile_photo');
    $new_name = rand() . '.' . $image->getClientOriginalExtension();
    $image->move(public_path('/assets/images/profile'), $new_name);
    Users::where('id', '=', $id)->update(['user_profile' => $new_name]);
    Session::flash('alert-success', "Photo Uploaded Successfully.");
    return redirect()->back();
  }

} // End of Controller