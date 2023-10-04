<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}

Auth::routes();

Route::get('/superadmin/addproduct',[
   'middleware' => 'superadmin',
   'uses' => 'SuperAdminController@addproduct',
]);

Route::get('/admin',[
   'middleware' => 'admin',
   'uses' => 'AdminController@index',
]);
Route::get('/admin/homephotos',[
   'middleware' => 'admin',
   'uses' => 'AdminController@homephotos',
]);

Route::get('admin/shops',[
   'middleware' => 'admin',
   'uses' => 'AdminController@shops',
]);

Route::get('admin/product/edit/{id}',[
   'middleware' => 'admin',
   'uses' => 'AdminController@editproductform',
]);
Route::get('admin/addcategory',[
   'middleware' => 'admin',
   'uses' => 'AdminController@addcategory',
]);
Route::get('admin/categories',[
   'middleware' => 'admin',
   'uses' => 'AdminController@categories',
]);
Route::get('admin/subcategories',[
   'middleware' => 'admin',
   'uses' => 'AdminController@subcategories',
]);
Route::get('/admin/resale/products',[
   'middleware' => 'admin',
   'uses' => 'AdminController@showresaleproducts',
]);
Route::get('admin/users',[
   'middleware' => 'admin',
   'uses' => 'AdminController@users',
]);
Route::get('admin/showcustomers',[
   'middleware' => 'admin',
   'uses' => 'AdminController@show_customers',
]);
Route::get('admin/shoplists',[
   'middleware' => 'admin',
   'uses' => 'AdminController@show_shops',
]);
Route::get('admin/starusers',[
   'middleware' => 'admin',
   'uses' => 'AdminController@show_star_users',
]);
Route::get('admin/userorders',[
   'middleware' => 'admin',
   'uses' => 'AdminController@show_user_orders',
]);
Route::get('admin/showorders',[
   'middleware' => 'admin',
   'uses' => 'AdminController@show_orders',
]);
Route::get('admin/groceryitems',[
   'middleware' => 'admin',
   'uses' => 'AdminController@show_groceryItems',
]);
Route::get('admin/addbanners',[
   'middleware' => 'admin',
   'uses' => 'AdminController@add_groceryBanners',
]);
Route::get('admin/addsliders',[
   'middleware' => 'admin',
   'uses' => 'AdminController@add_grocerySliders',
]);
Route::get('admin/groceryitem/edit/{id}',[
   'middleware' => 'admin',
   'uses' => 'AdminController@edit_groceryItem',
]);
Route::get('admin/addgrocerysubcategory',[
   'middleware' => 'admin',
   'uses' => 'AdminController@addgrocerysubcategory',
]);
Route::get('admin/addgrocery',[
   'middleware' => 'admin',
   'uses' => 'AdminController@add_groceryItem',
]);
Route::get('admin/groceryconfig',[
   'middleware' => 'admin',
   'uses' => 'AdminController@show_groceryConfig',
]);

Route::get('admin/products',[
   'middleware' => 'admin',
   'uses' => 'AdminController@products',
]);
Route::get('shop/products',[
   'middleware' => 'admin',
   'uses' => 'ShopController@products',
]);
Route::get('shop/ads',[
   'middleware' => 'admin',
   'uses' => 'ShopController@showads',
]);

Route::get('admin/getUsers',[
   'middleware' => 'admin',
   'uses' => 'AdminController@getUsers',
]);

Route::get('admin/getProducts',[
   'middleware' => 'admin',
   'uses' => 'AdminController@getProducts',
]);
Route::get('/admin/getAds',[
   'middleware' => 'admin',
   'uses' => 'AdminController@getAds',
]);

Route::get('admin/fetchallshops',[
   'middleware' => 'admin',
   'uses' => 'AdminController@fetchallshops',
]);

Route::get('admin/fetchalljyantishops',[
   'middleware' => 'admin',
   'uses' => 'AdminController@fetchalljyantishops',
]);

Route::get('admin/fetchcategories',[
   'middleware' => 'admin',
   'uses' => 'AdminController@getallcategories',
]);

Route::get('admin/fetchallsubcategories',[
   'middleware' => 'admin',
   'uses' => 'AdminController@fetchallsubcategories',
]);

Route::get('admin/getCategories',[
   'middleware' => 'admin',
   'uses' => 'AdminController@getCategories',
]);

Route::get('/admin/editshop/{id}',[
   'middleware' => 'admin',
   'uses' => 'AdminController@editshop',
]);
Route::get('/admin/addproduct',[
   'middleware' => 'admin',
   'uses' => 'AdminController@addproductform',
]);
Route::get('/admin/createads',[
   'middleware' => 'admin',
   'uses' => 'AdminController@createads',
]);

Route::get('/shop/addproduct',[
   'middleware' => 'shop',
   'uses' => 'ShopController@addproduct',
]);

Route::get('/productsjson',[
   'middleware' => 'admin',
   'uses' => 'AdminController@getProductsJSON',
]);
Route::get('/groceryitemsjson',[
   'middleware' => 'admin',
   'uses' => 'AdminController@getGroceryItemsJSON',
]);
Route::get('/customerordersjson',[
   'middleware' => 'admin',
   'uses' => 'AdminController@getCustomerOrdersJSON',
]);
Route::get('/customersjson',[
   'middleware' => 'admin',
   'uses' => 'AdminController@getCustomersJSON',
]);
Route::get('/shopsjson',[
   'middleware' => 'admin',
   'uses' => 'AdminController@getShopsJSON',
]);
Route::get('/userordersjson',[
   'middleware' => 'admin',
   'uses' => 'AdminController@getVendorOrdersJSON',
]);
Route::get('/starusersjson',[
   'middleware' => 'admin',
   'uses' => 'AdminController@getStarUsersJSON',
]);
Route::get('/fetchresaleproducts',[
   'middleware' => 'admin',
   'uses' => 'AdminController@fetchresaleproducts',
]);

// Customer Section
Route::get('/customer/service/create',[
   'middleware' => 'admin',
   'uses' => 'CustomerController@createservice',
]);
Route::get('/customer/resale/create',[
   'middleware' => 'admin',
   'uses' => 'CustomerController@createresale',
]);
Route::get('/customer/news/create',[
   'middleware' => 'admin',
   'uses' => 'CustomerController@createnews',
]);
Route::get('/customer/fungame/create',[
   'middleware' => 'admin',
   'uses' => 'CustomerController@createfungame',
]);
Route::get('customer/getServiceCategories',[
   'middleware' => 'admin',
   'uses' => 'CustomerController@getServiceCategories',
]);
Route::get('customer/getServiceCategories',[
   'middleware' => 'admin',
   'uses' => 'CustomerController@getServiceCategories',
]);

Route::get('customer/getResaleCategories',[
   'middleware' => 'admin',
   'uses' => 'CustomerController@getResaleCategories',
]);
Route::get('customer/getNewsCategories',[
   'middleware' => 'admin',
   'uses' => 'CustomerController@getNewsCategories',
]);
Route::get('customer/getFungameCategories',[
   'middleware' => 'admin',
   'uses' => 'CustomerController@getFungameCategories',
]);
Route::get('/profile',[
   'middleware' => 'admin',
   'uses' => 'CustomerController@getProfile',
]);

/*Route::get('/postresaleproduct',[
   'middleware' => 'customer',
   'uses' => 'CustomerController@createresale',
]);*/

Route::get('/', 'HomeController@index')->name('home');	//->middleware('verifyrole');
//Route::get('/', 'HomeController@new_home')->name('ration-products');  //->middleware('verifyrole');
Route::get('/geetajyanti', 'JyantiController@index'); // Working if Geeta Jyanti Going on
Route::get('/geetajyantishops', 'JyantiController@show_shop_images');
Route::get('/GeetaJyanti/shop/{id}', 'JyantiController@shop_details');
Route::get('Jyanti/Map', 'JyantiController@show_map');
Route::get('/category/Shopping', 'ShoppingController@index');
Route::get('/Shopping/type/{type}', 'ShoppingController@shoppingtype');
Route::get('/Shopping/shops', 'ShoppingController@shopping_shops');
Route::get('/Services/shops', 'ServicesController@servicesshops');
Route::get('/Shopping/shop/{id}', 'ShoppingController@shopping_singleshop');
Route::get('/Services/shop/{id}', 'ServicesController@services_singleshop');
Route::get('/Shopping/product/{id}', 'ShoppingController@shop_product');
Route::get('/Shopping/shop/product/{id}', 'ShoppingController@shop_single_product');
Route::get('/Services/shop/product/{id}', 'ServicesController@shop_product');
Route::get('/Resale/product/{id}', 'ResaleController@show_product');
Route::get('/Shopping/ads', 'ShoppingController@shoppingads');
Route::get('/Shopping/ads/{id}', 'ShoppingController@showads');
Route::get('/Resale/ads', 'ResaleController@resaleads');
Route::get('/services', 'HomeController@services');
Route::get('/serviceprovider/add', 'ServicesController@register_service');
Route::get('/serviceprovider/{id}', 'ServicesController@details_service_provider');
Route::get('/resale', 'HomeController@resale');
Route::get('/subcategory/resale/{id}', 'HomeController@resalesubcategory');
Route::get('/postresaleproduct', 'HomeController@postresaleproduct')->middleware('auth');;
Route::get('/shopping', 'HomeController@shopping');
Route::get('/Shopping/products', 'ShoppingController@shoppingproducts');
Route::get('Jyanti/programs', 'JyantiController@show_programs');
Route::get('Jyanti/shopkeepers', 'JyantiController@show_shopkeeper_photos');
Route::get('Jyanti/shopmages', 'JyantiController@show_shop_images');
Route::get('Jyanti/customers', 'JyantiController@show_customer_photos');
Route::get('/home', 'HomeController@home')->name('home')->middleware('verifyrole');
Route::get('/grocery', 'HomeController@showgrocery')->name('grocery');
Route::get('/fruits-vegetables', 'HomeController@fruits_vegetables')->name('fruits_vegetables');
Route::get('/ration', 'HomeController@showration')->name('ration');
Route::get('/ration-products', 'HomeController@ration_products')->name('ration_products');
Route::get('/ration-products/{id}', 'HomeController@ration_products_subcategory')->name('ration_products_subcategory');
Route::get('/category', 'HomeController@category')->name('category');
Route::get('/products', 'HomeController@showallproducts')->name('show_products');
Route::get('/products/{id}', 'HomeController@show_product_categorywise');
Route::get('/register/customer', 'HomeController@register_customer');
Route::get('/register/shop', 'HomeController@register_shop');
Route::get('/register/geetashop', 'HomeController@register_geeta_shop');
Route::post('/registershop', 'HomeController@doRegisterShop');
//Route::post('/checkout', 'HomeController@showcheckout')->name('checkout');
Route::get('/news', 'HomeController@news');
Route::get('/news/{category}', 'HomeController@shownewscategory');
Route::get('/newsubcategory/{category}', 'HomeController@newsubcategory');
Route::get('/shownews', 'HomeController@shownewscategory');
Route::get('/postnews', 'HomeController@postnews')->middleware('auth');
Route::post('/submitnews', 'NewsController@submitnews');
Route::get('/vuejscart', 'HomeController@vuejscart'); // VueJS
Route::post('/fetchAllDatavuejsdata', 'HomeController@fetchAllDatavuejsdata'); // VueJS 
Route::get('/offer', 'HomeController@getoffer');
Route::get('/getcartdetails', 'HomeController@getcartdetails');
Route::get('/Shopping/shops', 'ShoppingController@shopping_shops');
Route::get('/Services/shops', 'ServicesController@servicesshops');
Route::get('/Shopping/shop/{id}', 'ShoppingController@shopping_singleshop');
Route::get('/Services/shop/{id}', 'ServicesController@services_singleshop');
Route::get('/Shopping/product/{id}', 'ShoppingController@shop_product');
Route::get('/Shopping/shop/product/{id}', 'ShoppingController@shop_single_product');
Route::get('/Services/shop/product/{id}', 'ServicesController@shop_product');
Route::get('/Resale/product/{id}', 'ResaleController@show_product');
Route::get('/Shopping/ads', 'ShoppingController@shoppingads');
Route::get('/Shopping/ads/{id}', 'ShoppingController@showads');
Route::get('/Resale/ads', 'ResaleController@resaleads');
Route::get('/resale/{category}', 'HomeController@resalesubcategory');
Route::get('/resalesubcategory/{id}', 'HomeController@showresalesubcategory');
Route::get('/Shopping/products', 'ShoppingController@shoppingproducts');
Route::post('/confirmorder', 'ShopController@confirmorder');
Route::get('/thankyou', 'ShopController@thankyou');
Route::post('/payment', 'ShopController@showpayment');
Route::post('/getShops', 'ShopController@getShops');
Route::get('/cart', 'ShopController@getCart')->name('cart');
Route::post('/checkout', 'ShopController@checkout')->name('checkout');
Route::post('/cartadd', 'ShopController@addToCart');
Route::post('/updatecart', 'ShopController@updateCart');
Route::post('/fullupdatecart', 'ShopController@fullupdateCart');
Route::post('/reducecart', 'ShopController@reduceCart');
Route::post('/updatecarttype', 'ShopController@updateCartType');
Route::post('/remove-from-cart', 'ShopController@removeCart');
Route::post('/verifycart', 'ShopController@verifyCart'); // Working
//Route::post('/remove-from-cart', 'ShopController@removeCart')->middleware('cart_verify');
Route::get('/emptycart', 'ShopController@emptyCart');
Route::get('/clearcart', 'ShopController@clearcart');
Route::get('/submitorder', 'ShopController@submitOrder');
Route::get('/contact', 'HomeController@contact');
Route::post('/contact', 'MailController@submitcontact');
Route::get('/getcartdetail', 'ShopController@getcartdetail');

Route::get('/superadmin', 'SuperAdminController@index')->name('superadmin')->middleware('superadmin');
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::get('/shop', 'ShopController@index')->name('shop')->middleware('shop');
Route::get('/customer', 'CustomerController@index')->name('customer')->middleware('customer');

Route::post('/submitproductnew', 'AdminController@submitproductnew');
Route::post('/submitgroceryitem', 'AdminController@submitgroceryitem');
Route::post('/submithomephoto', 'AdminController@submithomephoto');
Route::post('/updateproduct', 'AdminController@updateproduct');
Route::post('/city', 'ShopController@select_city');
Route::post('/sendmail', 'HomeController@sendmail');
Route::post('/ration-products', 'HomeController@search_ration_products');
Route::post('/submitoffer', 'HomeController@submit_offer');
Route::post('/submitresaleproduct', 'HomeController@submitresaleproduct');
Route::post('/getcities', 'HomeController@getcities');
Route::post('/getrationsubcategory', 'HomeController@getRationSubcategories');
Route::post('/getgrocerysubcategory', 'AdminController@getgrocerysubcategory');
Route::post('/submitgrocerycategory', 'AdminController@submitgrocerycategory');
Route::post('/submitgrocerysubcategory', 'AdminController@submitgrocerysubcategory');
Route::post('/submitgrocerybanner', 'AdminController@submitgrocerybanner');
Route::post('/submitgroceryslider', 'AdminController@submitgroceryslider');
Route::post('/deleteGroceryItem', 'AdminController@deleteGroceryItem');
Route::get('/deletebanner', 'AdminController@deletebanner');
Route::get('/deleteslider', 'AdminController@deleteslider');
Route::post('/updategroceryitem', 'AdminController@updateGroceryItem');
Route::post('/getstates', 'HomeController@getstates');
Route::get('/payment', 'HomeController@dopayment');
Route::get('/search', 'HomeController@dosearch');
Route::post('/submitserviceprovider', 'HomeController@submitserviceprovider');
Route::post('/bookservice', 'BookServicesController@store');
Route::post('/updateproductprice', 'ShopController@updateItemPrice');
Route::post('/updateGroceryConfig', 'AdminController@updateGroceryConfig');
Route::post('/changeCustomerStatus', 'AdminController@changeCustomerStatus');

Route::get('/cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    return "Cache is cleared";
});

Route::get('/command', function() {
    //Artisan::call('make:auth');
    return "Auth is generated";
});
Route::get('/migrate', function() {
    //Artisan::call('migrate:refresh');
    return "Migrate is generated";
});

