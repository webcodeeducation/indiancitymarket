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
use App\BookService;

class BookServicesController extends Controller
{
    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|max:255',
            'mobile' => 'required',
            'street' => 'required',
            'postalcode' => 'required',
            'state' => 'required',
            'city' => 'required',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('post/create')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Store the blog post...
        //print_r($_POST);
        //die();
        BookService::create($request->all());
        $msg = 'Service Booked Successfully';
        Session::flash('alert-success', $msg);
        return redirect()->back();
    }
}