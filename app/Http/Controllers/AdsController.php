<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Session;
use Hash;
use File;
use App\Categories;
use App\Ads;
use App\NewsCategory;
use App\AdCategory;
use App\Videos;
use App\News;


class AdsController extends Controller {

  public function __construct()
  {
    //$this->middleware('admin');
   // Redirect to under construction page
    //return redirect('/underconstruction');
  }
    public function index(Request $request){
    $id = \Request::segment(3);
    $check = Ads::where('id', '=', $id)->first();
    
    if ($check) {
        // found it
        $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
        $data['categories'] = Categories::where('isactive', 1)->get();
        $data['ads'] = Ads::where('id', '=', $id)->first();
        return view('ads-single')->with($data);
    } else {
        // not found
      $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
      $data['categories'] = Categories::where('isactive', 1)->get();
        return view('not-found-data-view')->with($data);;
    }
    }

    public function show_listings(Request $request) {
    $data['title'] = 'Indiancitymarket &mdash; A Directory where you can Buy and Sell all things in market at home.';
    $data['listings'] = Ads::where('isactive', 1)->paginate(10);
    return view('show_listings')->with($data);
   }

   public function submitlisting(Request $request){
    $validator = Validator::make($request->all(), [
            'category' => 'required|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,JPG,gif,svg|max:2048|dimensions:width=800,height=500',
            //'images' => 'required|image|mimes:jpeg,png,jpg,JPG,gif,svg|max:2048|dimensions:width=600,height=400',
            'ad_title' => 'required|max:255',
            'description' => 'required',
            'ad_city' => 'required|max:255',
            'ad_state' => 'required|max:255',
            'ad_address' => 'required|max:255',
            'ad_phone' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            /*return redirect('/addlisting')
                        ->withErrors($validator)
                        ->withInput();*/
          return redirect()->back()->withInput()->withErrors($validator);
        }
        
        $category = $request->input('category');
        $photo = $request->file('photo');
        $title = $request->input('ad_title');
        $description = $request->input('description');
        $city = $request->input('ad_city');
        $state = $request->input('ad_state');
        $address = $request->input('ad_address');
        $phone = $request->input('ad_phone');

        $new_name = rand() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('/assets/images/ads'), $new_name);

        $images=array();
    if($files=$request->file('images')){
        foreach($files as $file){
            $name = rand() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/assets/images/ads'), $name);
            $images[]=$name;
        }
    }
    /*Insert your data*/

    Ads::insert( [
        'category' => $category,
        'ad_photo' => $new_name,
        'ad_galleries'=>  implode("|",$images),
        'ad_title' => $title,
        'ad_description' =>$description,
        'ad_city' => $category,
        'ad_state' => $category,
        'ad_address' => $category,
        'phone_number' => $category,
        'isactive' => 1,
        //you can put other insertion here
    ]);

        
        //Mail::to($user->email)->send(new VerifyMail($user));
        //Mail::to('laxman091@gmail.com')->send(new VerifyMail($user));
        return redirect()->back();

   }
   public function addbookmark(Request $request){
    print_r($_POST);
    //die();
   }
   

}