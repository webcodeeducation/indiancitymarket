<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Hash;
use Mail;
use File;
use Image;
use App\VendorOrders;
use App\Banners;
use App\Sliders;
use App\Orders;
use App\Categories;
use App\GrocerySubcategories;
use App\GroceryCategories;
use App\CityCategories;
use App\Subcategories;
use App\ChildSubcategories;
use App\Cities;
use App\GroceryConfig;
use App\GroceryItems;
use App\Shops;
use App\JyantiShops;
use App\Users;
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
use App\ResaleProducts;
use App\HomePhotos;

class AdminController extends Controller
{
        /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index');
    }
    public function doLogout(Request $request) {
         //return view('admin.index');
  $request->session()->flush();
        $request->session()->regenerate();
        return redirect()->action('HomeController@login');
        //return redirect()->back();
   }
   public function getdetailsDashboard(){
    $users = Users::count();
    $shops = Shops::count();
    $categories = Categories::count();
    return response()->json(['users'=>$users,'category'=>$categories,'subcategory'=>$shops,  'products'=>$users]);
   }
  public function getAds(){
      $ads = Ads::all();
    return response()->json(['ads'=>$ads]);
    }
    public function getProductsJSON(){
      $products = ShoppingProducts::all();
      return response()->json(['data' => $products]);
     }
     public function fetchresaleproducts(){
      $products = ResaleProducts::all();
      return response()->json(['data' => $products]);
     }
   	public function getProducts(){
   		$products = Products::all();
    return response()->json(['data'=>$products]);
   	}
  public function products() {
      return view('admin.products');
   }
     public function users() {
      return view('admin.users');
   }
   public function shops() {
      return view('admin.shops');
   }
   public function getUsers(){
   	$users1 = Users::all();
    return response()->json(['data'=>$users1]);
   }
   public function showresaleproducts(){
    $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        //$data['cartitems'] = Session::get('cart');
        //$data['cartCount'] = Session::get('cart');;
        //$data['categories'] = ShoppingCategory::where('isactive', 1)->get();
        $data['products'] = ResaleProducts::all();
        return view('admin.show_resales')->with($data);
   }
  public function fetchallshops(){
   	$shops = Shops::all();
    return response()->json(['data'=>$shops]);
   }
  public function fetchalljyantishops(){
    $shops = JyantiShops::all();
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
   public function homephotos(){
    $data['title'] = 'Khushi Marriage Beauro | Matrimonial | India';
        $data['categories'] = ShoppingCategory::all();
        //$data['cities'] = Cities::all();
        return view('admin.add_home_photos')->with($data);
   }
   public function editproductform(){
   	//return view('admin.editproductform');
   	$id = \Request::segment(4);
      $data['title'] = 'Indiancitymarket: India';
      $data['categories'] = ShoppingCategory::where('isactive',1)->get();
      $data['product'] = ShoppingProducts::where('id', $id)->first();
      return view('admin.editproductform')->with($data);
   }
   public function categories() {
        return view('admin.categories');
   }
  public function settings() {
        $contacts = DB::table('contacts')->get();
        return view('admin.settings', ["contacts"=>$contacts]);
   }
   public function updateGroceryConfig(){
    //print_r($_POST);
    $data = array();
    parse_str($_POST['data'], $data);
    $value1 = $data['cashback'];
    $value2 = $data['is_cashback_enabled'];
    $value3 = $data['customer_refferer_cashback'];
    $value4 = $data['is_enabled_customer_refferer_cashback'];
    $value5 = $data['business_value_for_vendor'];
    $value6 = $data['customer_offer'];
    $value7 = $data['vendor_offer'];
    $value8 = $data['profile_offer'];
    GroceryConfig::where('id', '=', 1)->update(array('valuee' => $value1));
    GroceryConfig::where('id', '=', 2)->update(array('valuee' => $value2));
    GroceryConfig::where('id', '=', 3)->update(array('valuee' => $value3));
    GroceryConfig::where('id', '=', 4)->update(array('valuee' => $value4));
    GroceryConfig::where('id', '=', 5)->update(array('valuee' => $value5));
    GroceryConfig::where('id', '=', 6)->update(array('valuee' => $value6));
    GroceryConfig::where('id', '=', 7)->update(array('valuee' => $value7));
    GroceryConfig::where('id', '=', 8)->update(array('valuee' => $value8));
   }
   public function addgrocerysubcategory(){
    $cats = GroceryCategories::all();
    //return view('admin.grocery_add_item');
    return view('admin.grocery_add_subcategory', ['categories'=> $cats]);
    //return view('admin.grocery_add_subcategory');
   }
   public function submitgrocerycategory(Request $request){
    $validator = Validator::make($request->all(), [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_name' => 'required'
        ]);
            if ($validator->fails()) {
                return redirect('/admin/addcategory')
                        ->withErrors($validator)
                        ->withInput();
        }

        $category = $request->input('category_name');

        if ($files = $request->file('photo')) {
            $image = $request->file('photo');
            $fileName =  time().'.'.$request->photo->getClientOriginalExtension();
            //$destinationPath = public_path('/assets/grocery/categories');
            $destinationPath = base_path() . '/groceryapp/assets/categories';
            $image->move($destinationPath, $fileName);
            $prod = new GroceryCategories;
            $prod->name = $category;
            $prod->img = $fileName;
            $prod->save();
            Session::flash('alert-success', "Category Added Successfully.");
            return redirect()->back();
        }
   }
   public function submitgrocerysubcategory(Request $request){
    //print_r($_POST);
    //die();
    $validator = Validator::make($request->all(), [
            'category' => 'required',
            'category_name' => 'required'
        ]);
            if ($validator->fails()) {
                return redirect('/admin/addcategory')
                        ->withErrors($validator)
                        ->withInput();
        }

        $parent = $request->input('category');
        $category = $request->input('category_name');

        $prod = new GrocerySubcategories;
            $prod->name = $category;
            $prod->parent_cat = $parent;
            $prod->save();
            Session::flash('alert-success', "Subcategory Added Successfully.");
            return redirect()->back();
   }
   public function show_groceryItems(){
    //$products = GroceryItems::all();
    //return view('admin.grocery_items', ["products"=>$products]);
    return view('admin.grocery_items');
   }
   public function show_customers(){
    //$products = GroceryItems::all();
    //return view('admin.grocery_items', ["products"=>$products]);
    return view('admin.show_customer');
   }
   public function getgrocerysubcategory(Request $request){
    $cat_id = $request->id;
    $subcats = GrocerySubcategories::where('parent_cat',$cat_id)->get();
    return response()->json($subcats);
   }
   public function addcategory(){
    //$cats = GroceryCategories::all();
    //return view('admin.grocery_add_category');
    $data['title'] = 'Indiancitymarket | Grocery | Marketting | Products / Ecommerce | India';
        $data['categories'] = GroceryCategories::all();
        //$data['cities'] = Cities::all();
        return view('admin.grocery_add_category')->with($data);
   }
   public function add_groceryItem(){
    $cats = GroceryCategories::all();
    //return view('admin.grocery_add_item');
    return view('admin.grocery_add_item', ['categories'=> $cats]);
   }
   public function submitgroceryitem(Request $request){
    $validator = Validator::make($request->all(), [
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'required',
            'subcategory' => 'required',
            'title' => 'required',
            'details' => 'required',
            'qty' => 'required',
            'unit' => 'required',
            'price' => 'required'
        ]);
            if ($validator->fails()) {
                return redirect('/admin/addgrocery')
                        ->withErrors($validator)
                        ->withInput();
        }

        $category = $request->input('category');
        $subcategory = $request->input('subcategory');
        $title = $request->input('title');
        $details = $request->input('details');
        $qty = $request->input('qty');
        $unit = $request->input('unit');
        $price = $request->input('price');
 
        if ($files = $request->file('photo')) {
            $image = $request->file('photo');
            $fileName =  "prod_".time().'.'.$request->photo->getClientOriginalExtension();
            //$destinationPath = public_path('/assets/grocery/items');
            $destinationPath = base_path() . '/groceryapp/attachments/products';
            $image->move($destinationPath, $fileName);
            $prod = new GroceryItems;
            $prod->cat = $category;
            $prod->subcat = $subcategory;
            $prod->name = $title;
            $prod->desciption = $details;
            $prod->qty = $qty;
            $prod->unit = $unit;
            $prod->images = $fileName;
            $prod->price = $price;
            $prod->save();
            Session::flash('alert-success', "Grocery/Product Added Successfully.");
            return redirect()->back();
        }
   }
   public function show_groceryConfig(){
    $settings = GroceryConfig::all();
    return view('admin.grocery_config', ["settings"=>$settings]);
   }
    public function getallcategories() {
    //$cats = DB::table('category')->get();
    $cats = Categories::all();
    $html1 ='<select class="form-control changecategory" name="categoryname" >';
    $html1 .= '<option value="0">Select Category</option>';
    foreach ($cats as $key => $value) {
      $html1 .= '<option value="'.$value->id .'">' .$value->category_name .'</option>';
    }
    $html1 .= '</select>';
    return $html1;
   }
   public function selectedcategory(Request $request){
    $cat_id = $_POST['cat_id'];
    $subcats = Subcategories::where('parent_cat',$cat_id)->get();
    //print_r($subcats);
    //die();
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
        return view('admin.subcategories');
   }
   /*public function saveSubCategory(Request $request){
   	$input = $request->all();
   	print_r($input);
   	die();
   }*/
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
  public function updateproduct(Request $request){
  	print_r($_POST);
  	//die();
  	$id = $request->productid;
      $cat = $request->product_category;
      $name = $request->product_name;
      $weight = $request->product_weight;
      $detail = $request->product_description;
      $price = $request->product_price;
      ShoppingProducts::where('id', '=', $id)->update(array('category_id' => $cat,'product_name'=>$name,'product_price'=>$price, 'product_weight'=>$weight, 'product_details'=>$detail));
      Session::flash('alert-success', "PRoduct Updated Successfully.");
        return back()->with('success','Image Uploaded successfully');
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
    /*$data = $request->all();
        /*$image = $request->file('prodimage');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('/assets/images/products'), $new_name);*/

        //print_r($_POST);
        //die();
        $params = array();
        parse_str($_POST['formdata'], $params);
        //print_r($params);//prod_capacity_c10
        $main_category = $params['categoryname'];
        $subcategory = $params['subcategoryname'];
        $prod_type = $params['prod_type'];
        $prod_description = $params['prod_description'];
        $prod_volt = $params['prod_volt'];
        $prod_capacity = $params['prod_capacity'];
        $prod_capacity_c10 = $params['prod_capacity_c10'];
        $prod_dim_L5 = $params['prod_dim_L5'];
        $prod_dim_W5 = $params['prod_dim_W5'];
        $prod_dim_H5 = $params['prod_dim_H5'];
        $prod_current_start = $params['prod_current_start'];
        $prod_current_finish = $params['prod_current_finish'];
        $prod_weight_dry = $params['prod_weight_dry'];
        $prod_weight_filled = $params['prod_weight_filled'];
        $prod_qty_acid = $params['prod_qty_acid'];
        /*DB::table('products')->insert(['main_category' => $main_category,'subcategory' => $subcategory,'prod_type' => $prod_type,'prod_description' => $prod_description,'prod_volt' => $prod_volt,'prod_capacity' => $prod_capacity,'prod_capacity_c10' => $prod_capacity_c10,'prod_dim_L5' => $prod_dim_L5,'prod_dim_W5' => $prod_dim_W5,'prod_dim_H5' => $prod_dim_H5,'prod_current_start' => $prod_current_start,'prod_current_finish' => $prod_current_finish,'prod_weight_dry' => $prod_weight_dry,'prod_weight_filled' => $prod_weight_filled,'prod_qty_acid' => $prod_qty_acid]);*/

        /*$prod = new Products;
        $prod->main_category = $main_category;
        $prod->subcategory = $subcategory;
        $prod->prod_type = $prod_type;
        $prod->prod_volt = $prod_volt;
        $prod->prod_capacity = $prod_capacity;
        $prod->prod_dim_L5 = $prod_dim_L5;
        $prod->prod_dim_W5 = $prod_dim_H5;
        $prod->prod_current_start = $prod_current_start;
        $prod->prod_current_finish = $prod_current_finish;
        $prod->prod_weight_dry = $prod_weight_dry;
        $prod->prod_weight_filled = $prod_weight_filled;
        $prod->prod_qty_acid = $prod_qty_acid;
        $prod->save();*/
        $msg = 'Product added successfully';
        return response()->json(['msg' => $msg]);
  }
  public function getGroceryItemsJSON(){
    $products = GroceryItems::all();
    return response()->json(["data" => $products]);
  }
   public function fetchCategories(){
    $categories = Categories::all();
    return response()->json(["data" => $categories]);
   }
   public function getCategories(){
    $categories = Categories::all();
    return response()->json(["data" => $categories]);
   }

   public function fetchallsubcategories(){
    //$subcategories = DB::table('subcategory')->get();
    $subcategories = Subcategories::all();
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

    /*$params = array();
    parse_str($_POST['formdata'], $params);
    $cat_id = $params['categoryname'];
    $subcat = $params['category'];
    print_r($params);
    die();*/

    $cat_id = $request->input('categoryname');
    $category = $request->input('category');
    $image = $request->file('logo');
    $new_name = rand() . '.' . $image->getClientOriginalExtension();

    $count = Subcategories::where('subcat_name', '=', $category)->count();
      if($count == 1){
        $msg = 'SubCategory already Added. Please try another Subcategory Name. Thankyou';
      }else{
      	$image->move(public_path('/assets/images/subcategory'), $new_name);
        // create new user and save it
        $cat = new Subcategories;
        $cat->parent_cat = $cat_id;
        $cat->subcat_name = $category;
        $cat->subcat_image = $new_name;
        $cat->save();
        $msg = 'Category added successfully';
      }
       return redirect('admin/subcategories')->with('status', $msg);
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
  public function registershop(Request $request){
    $model = JyantiShops::orderBy('id', 'desc')->first();
    $new_shop_number = $model->shop_number + 1;
    $shopname = $request->input('shopname');
    $mobile = $request->input('mobile');
    $address = $request->input('address');
    $country = $request->input('country');
    $state = $request->input('state');
    $city = $request->input('city');
    $pincode = $request->input('pincode');
    $email = $request->input('email');
    $shop_logo_image = $request->file('shop_number_logo');
    $shop_image = $request->file('shop_image');
    $new_name1 = rand() . '.' . $shop_logo_image->getClientOriginalExtension();
    $new_name2 = rand() . '.' . $shop_image->getClientOriginalExtension();
     $count = JyantiShops::where('shop_number', '=', $new_shop_number)->count();
      if($count == 1){
        $msg = 'Shop already Added. Please try another Shop Name. Thankyou';
      }else{
        $shop_logo_image->move(public_path('/assets/geeta_jyanti/shop_images'), $new_name1);
        $shop_image->move(public_path('/assets/geeta_jyanti/shop_images'), $new_name2);
        // create new shop and save it
        $shop = new JyantiShops;
        $shop->shop_number = $new_shop_number;
        $shop->shop_number_logo = $new_name1;
        $shop->shop_image = $new_name2;
        $shop->shop_owner = $shopname;
        $shop->shop_name = $shopname;
        $shop->shop_phone = $mobile;
        $shop->shop_email = $email;
        $shop->save();
        $msg = 'Shop Registered Successfully';
      }
      Session::flash('success', $msg);
        //return redirect('/customer/news/create')->with('success', $msg);   
        return redirect()->back();
  }

    public function editshop(Request $request){
      $shop_id = \Request::segment(3);
      $shop = JyantiShops::where('id', '=', $shop_id)->first();
      return view('admin.editshop', ['shop_id'=>$shop_id,'shop'=>$shop]);
    }
    public function add_jyanti_product(Request $request){
      $shop_id = \Request::segment(3);
      $shop = JyantiShops::where('id','=', $shop_id)->first();
        //print_r($shop);
        return view('admin.addjyantishop_product', ['shop'=>$shop]);

    }
    public function updateshop(Request $request){
      $id = $request->input('shopid');
      $shop_type = $request->input('shop_type');
      $shop_owner = $request->input('shop_owner');
      $shop_name = $request->input('shop_name');
      $shop_phone = $request->input('shop_phone');
      $shop_address = $request->input('shop_address');
      $shop_email = $request->input('shop_email');
      JyantiShops::where('id', '=', $id)->update(['shop_type' => $shop_type,'shop_owner'=>$shop_owner,'shop_name'=>$shop_name,'shop_phone'=>$shop_phone,'shop_address'=>$shop_address,'shop_email'=>$shop_email]);
      $msg = 'Shop Updated Successfully';
      Session::flash('alert-success', $msg);
      return redirect()->back();
    }
    public function updateshopimage(Request $request){
      $id = $request->input('shopid');
      $image = $request->file('shop_image');
      $new_name = rand() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path('/assets/geeta_jyanti/shop_images'), $new_name);
      JyantiShops::where('id', '=', $id)->update(['shop_image' => $new_name]);
      $msg = 'Shop Image Updated Successfully';
      Session::flash('alert-success', $msg);
      return redirect()->back();
    }
      public function updateshopnumberlogo(Request $request){
      $id = $request->input('shopid');
      $image = $request->file('shop_number_logo');
      $new_name = rand() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path('/assets/geeta_jyanti/shop_images'), $new_name);
      JyantiShops::where('id', '=', $id)->update(['shop_number_logo' => $new_name]);
      $msg = 'Shop Number Image Updated Successfully';
      Session::flash('alert-success', $msg);
      return redirect()->back();
    }
    public function addproductform(){
      //$shops = JyantiShops::all();
      //return view('admin.addproduct', ['shops'=>$shops]);

    	$data['title'] = 'Khushi Marriage Beauro | Matrimonial | India';
        $data['categories'] = ShoppingCategory::all();
        //$data['cities'] = Cities::all();
        return view('admin.addproduct')->with($data);
    }
    public function addproduct(Request $request){
      $id = $request->input('shop_id');
      $prod_names = $request->input('products');
      JyantiShops::where('id', $id)->update(array('prod_lists' => $prod_names));
      /*$prod = new JyantiShopProducts;
        $prod->shop_id = $shop_id;
        $prod->prod_lists = $prod_name;
        $prod->save();*/
        $msg = 'Product Updated Successfully';
        Session::flash('alert-success', $msg);
        return redirect()->back();
    }
    public function create_jyanti_ads(Request $request){
      return view('admin.addjyantishop_ads');
    }
    public function savejyantiads(Request $request){
      $shop_number = $request->input('shop_number');
      $shop_category = $request->input('shop_category');
      $image = $request->file('shop_image');
      $new_name = rand() . '.' . $image->getClientOriginalExtension();

      $count = JyantiAds::where('shop_number', '=', $shop_number)->count();
      if($count > 0){
        $msg = 'Shop Ads already Added. Please try another Shop Name. Thankyou';
      }else{
        $image->move(public_path('/assets/geeta_jyanti/ads'), $new_name);
        // create new user and save it
        $ads = new JyantiAds();
        $ads->shop_number = $shop_number;
        $ads->shop_image = $new_name;
        $ads->shop_category = $shop_category;
        $ads->save();
        $msg = 'Shop Ads added successfully';
      }
      Session::flash('alert-success', $msg);
        return redirect()->back();
    }
    public function createads(Request $request){
      $categories = Categories::all();
      return view('admin.add_ads', ['categories'=>$categories]);
    }
    public function saveHomeAds(Request $request){
      //print_r($_POST);
      //die();
      $category = $request->input('categoryname');
      $title = $request->input('ads_title');
      $description = $request->input('ads_description');
      $city = $request->input('ads_city');
      $price = $request->input('ads_price');
      $tags = $request->input('ads_tags');
      $brand = $request->input('brand_name');
      $email = $request->input('email');
      $phone_number = $request->input('phone_number');
      $image = $request->file('ad_photo');
      $new_name = rand() . '.' . $image->getClientOriginalExtension();
      $image->move(public_path('/assets/images/ads'), $new_name);
        // create new user and save it
        $ads = new Ads();
        $ads->ad_photo = $new_name;
        $ads->cat_id = $category;
        $ads->ad_title = $title;
        $ads->ad_description = $description;
        $ads->ad_price = $price;
        $ads->ad_city = $city;
        $ads->ad_tags = $tags;
        $ads->brand_name = $brand;
        $ads->emails = $email;
        $ads->phone_number = $phone_number;
        $ads->save();
        $msg = 'Ads added successfully';
        Session::flash('alert-success', $msg);
        return redirect()->back();
    }
    public function submitproductnew(Request $request){
    	$validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_subcategory' => 'required',
            //'product_subcategory' => 'required',
            'product_name' => 'required',
            'product_weight' => 'required',
            'product_mrp' => 'required',
            'product_save_price' => 'required',
            'product_price' => 'required',
            'product_description' => 'required',
            'percentage_discount' => 'required',
        ]);
            if ($validator->fails()) {
                return redirect('/admin/addproduct')
                        ->withErrors($validator)
                        ->withInput();
        }

        $product_category = $request->input('product_category');
        $subcategory_id = $request->input('product_subcategory');
        //$product_subcategory = $request->input('product_subcategory');
        $product_name = $request->input('product_name');
        $product_weight = $request->input('product_weight');
        $product_mrp = $request->input('product_mrp');
        $product_save_mrp = $request->input('product_save_price');
        $product_price = $request->input('product_price');
        $product_description = $request->input('product_description');
        $percentage_discount = $request->input('percentage_discount');
 
        if ($files = $request->file('image')) {
            $image = $request->file('image');
            $fileName =  "prod_".time().'.'.$request->image->getClientOriginalExtension();
            //$request->image->storeAs('public/assets/images', $fileName);
            $destinationPath = public_path('/assets/images/products');
	          $image->move($destinationPath, $fileName);
            $prod = new ShoppingProducts;
            $prod->category_id = $product_category;
            $prod->subcategory_id = $subcategory_id;
            $prod->product_image = $fileName;
            $prod->product_name = $product_name;
            $prod->product_mrp = $product_mrp;
            $prod->product_save_mrp = $product_save_mrp;
            $prod->product_price = $product_price;
            $prod->product_weight = $product_weight;
            $prod->product_offers = $percentage_discount;
            $prod->save();
            Session::flash('alert-success', "Product Added Successfully.");
            return redirect()->back();
        }
    }
    public function submithomephoto(Request $request){
      $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
            if ($validator->fails()) {
                return redirect('/admin/homephotos')
                        ->withErrors($validator)
                        ->withInput();
        }

 
        if ($files = $request->file('image')) {
            $image = $request->file('image');
            $fileName =  "home_".time().'.'.$request->image->getClientOriginalExtension();
            //$request->image->storeAs('public/assets/images', $fileName);
            $destinationPath = public_path('/assets/images/homephotos');
            $image->move($destinationPath, $fileName);
            $photo = new HomePhotos;
            $photo->photo = $fileName;
            $photo->save();
            Session::flash('alert-success', "Home Photo Uploaded Successfully.");
            return redirect()->back();
        }
    }
    public function deleteGroceryItem(Request $request){
      $id = $request->id;
      $contact = GroceryItems::destroy($id);
    }
    public function edit_groceryItem(){
        $cid = \Request::segment(4);
        $data['title'] = 'Indiancitymarket | Grocery | Edit Item';
        $data['categories'] = GroceryCategories::all();
        $data['item'] = GroceryItems::find($cid);
        return view('admin.edit_item')->with($data);
    }
    public function updateGroceryItem(Request $request){
      $id = $request->itemid;
      $data = array('cat' => $request->category, 'subcat' => $request->subcategory, 
                                    'name' => $request->title, 'description' => $request->details, 'qty' => $request->qty, 'unit' => $request->unit, 'price' => $request->price);
      $cust = GroceryItems::where('id', $id)->update($data);
      Session::flash('alert-success', "Item Updated Successfully.");
      return redirect()->back();
    }
    public function add_groceryBanners(){
      $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['banners'] = Banners::all();
        return view('admin.grocery_add_banners')->with($data);
    }
    public function submitgrocerybanner(Request $request){
      $validator = Validator::make($request->all(), [
            'banner' => 'required',
            'banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
            if ($validator->fails()) {
                return redirect('/admin/addbanners')
                        ->withErrors($validator)
                        ->withInput();
        }

          $type = $request->type;
        if ($files = $request->file('banner')) {
            $image = $request->file('banner');
            $fileName =  "banner_".time().'.'.$request->banner->getClientOriginalExtension();
            $destinationPath = base_path() . '/groceryapp/attachments/banners';
            $image->move($destinationPath, $fileName);
            $photo = new Banners;
            $photo->type = $type;
            $photo->banner_name = $fileName;
            $photo->save();
            Session::flash('alert-success', "Banner Uploaded Successfully.");
            return redirect()->back();
        }
    }
    public function submitgroceryslider(Request $request){
      $validator = Validator::make($request->all(), [
            'type' => 'required',
            'slider' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
            if ($validator->fails()) {
                return redirect('/admin/addsliders')
                        ->withErrors($validator)
                        ->withInput();
        }

        $type = $request->type;
        if ($files = $request->file('slider')) {
            $image = $request->file('slider');
            $fileName =  "slider_".time().'.'.$request->slider->getClientOriginalExtension();
            $destinationPath = base_path() . '/groceryapp/attachments/sliders';
            $image->move($destinationPath, $fileName);
            $photo = new Sliders;
            $photo->type = $type;
            $photo->image = $fileName;
            $photo->save();
            Session::flash('alert-success', "Slider Uploaded Successfully.");
            return redirect()->back();
        }
    }
    public function deletebanner(Request $request){
      $id = $request->id;
      $name = $request->name;
      //$filename = public_path('/assets/images/banners/') . $name;
      $destinationPath = base_path() . '/groceryapp/attachments/banners' . $name;
      File::delete($destinationPath);
      $banner = Banners::destroy($id);
      Session::flash('alert-success', "Banner Deleted Successfully.");
      //return redirect()->back();
    }
    public function deleteslider(Request $request){
      $id = $request->id;
      $name = $request->name;
      $destinationPath = base_path() . '/groceryapp/attachments/sliders' . $name;
      File::delete($destinationPath);
      $slider = Sliders::destroy($id);
      Session::flash('alert-success', "Slider Deleted Successfully.");
      return redirect()->back();
    }
    public function add_grocerySliders(){
      $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['sliders'] = Sliders::all();
        return view('admin.grocery_add_sliders')->with($data);
    }
    public function getCustomersJSON(Request $request){
    $users = User::where('role',4)->get();
    return response()->json(array('data'=>$users));
    }
    public function show_orders(){
      return view('admin.show_orders');
    }
    public function getCustomerOrdersJSON(Request $request){
      $orders = Orders::all();
      return response()->json(array('data'=>$orders));
    }
    public function show_shops(){
      return view('admin.show_shops');
    }
    public function show_star_users(){
      return view('admin.show_star_users');
    }
    public function getShopsJSON(Request $request){
      $shops = Shops::all();
      return response()->json(array('data'=>$shops));
    }
    public function getStarUsersJSON(){
     $users = User::where('isactive', 1)->get();
      return response()->json(array('data'=>$users)); 
    }
    public function changeCustomerStatus(Request $request){
      $id = $request->id;
      User::where('id', $id)->update(array('isactive' => $request->status));
    }
    public function show_user_orders(){
      //$orders = VendorOrders::->showOrders();
      //print_r($orders);
      return view('admin.show_user_orders');
    }
    public function getVendorOrdersJSON(){
      $orders = VendorOrders::all();
      return response()->json(array('data'=>$orders));
    }

}	// end Class
