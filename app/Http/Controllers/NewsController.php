<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Session;
use Hash;
use Auth;
use App\Categories;
use App\NewsCategory;
use App\AdCategory;
use App\Videos;
use App\News;


class NewsController extends Controller {

  public function __construct()
  {
    //$this->middleware('admin');
  }
   public function index(Request $request) {
    $cat_name = \Request::segment(2);
    $pager = Categories::where('isactive', 1)->get();
    $category = Categories::where('category_name','=', $cat_name)->first();
    $categories = NewsCategory::where('isactive', 1)->get();  
    $videos = Videos::where('cat_id', '=', $category->id)->get();
    return view('news_category.index', ['categories'=>$categories, 'videos'=>$videos,'pager'=>$pager,'cat_name'=>$cat_name]);
   }
   public function play_video(Request $request){
    $id = \Request::segment(5);
    $categories = NewsCategory::where('isactive', 1)->get();
    $video = Videos::where('id', '=', $id)->get();
    return view('news_category.play_videos', ['categories'=>$categories, 'video'=>$video]);
   }
   public function show_news(Request $request){
    $cat_id = \Request::segment(4);
    //$category = Categories::where('category_name','=', $cat_name)->first();
    $categories = NewsCategory::where('id','=', $cat_id)->first();  
    $news = News::where('news_category', '=', $cat_id)->get();
    //print_r($news);
    //die();
    return view('news_category.show_news', ['categories'=>$categories, 'news'=>$news]);
   }

   public function read_news(Request $request){
    $cat_id = \Request::segment(3);
    //$category = Categories::where('category_name','=', $cat_name)->first();
    $categories = NewsCategory::where('id','=', $cat_id)->first();  
    $news = News::where('news_category', '=', $cat_id)->first();
    //print_r($news);
    //die();
    return view('news_category.read_news', ['categories'=>$categories, 'news'=>$news]);
   }
   public function submitNews(Request $request){
    //print_r($_POST);
    $category = $request->category;
    $header = $request->header;
    $title = $request->title;
    $city = $request->city;
    $description = $request->description;

    $header_name = rand() . '.' . $request->header->getClientOriginalExtension();

    $header->move(public_path('/assets/news'), $header_name);

    $flight = new News;
    $flight->userid = Auth::id();
    $flight->news_city = $city;
    $flight->news_category = $request->category;
    $flight->news_header = $header_name;
    $flight->news_title = $request->title;
    $flight->news_desc = $request->description;
    $flight->save();
    $msg = 'News Posted Successfully';
    Session::flash('alert-success', $msg);
    return redirect()->back();
   }

}