<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Session;
use Mail;
use Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Users;
use App\JyantiShops;


class MailController extends Controller {
   
   //public function mailToAdmin(ContactFormRequest $message, Admin $admin){
    public function basic_email(){
      $data = array('name'=>$_POST['user_name'], 'phone' =>$_POST['user_phone'],'email' =>$_POST['user_email'], 'comment' => $_POST['user_comment'] );
   
      Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('webcodeeducation@gmail.com', 'Web Code Education')->subject('User Query');
         $message->from('webcodeeducation@gmail.com','Web Code Education');
      });

        Session::flash('message', "Thanks to Submit your Query...");
        return redirect()->back();
   }
   public function html_email(){
      $data = array('name'=>"Web Code Education");
      Mail::send('mail', $data, function($message) {
         $message->to('laxman091@gmail.com', 'Tutorials Point')->subject
            ('Laravel HTML Testing Mail');
         $message->from('noreply@allcodingworld.com','Web Code Education');
      });
      echo "HTML Email Sent. Check your inbox.";
   }
   public function attachment_email(){
      $data = array('name'=>"Web Code Education");
      Mail::send('mail', $data, function($message) {
         $message->to('laxman091@gmail.com', 'Tutorials Point')->subject ('Laravel Testing Mail with Attachment');
         $message->from('noreply@allcodingworld.com','Web Code Education');
      });
      echo "Email Sent with attachment. Check your inbox.";
   }

    public function subscribe_email(Request $request){
        $email = $request->input('subscribe_email');
        $ip_address = $request->ip();
        DB::insert('insert into lr_subscribers (subscriber_email, subscriber_ip) values(?, ?)',[$email, $ip_address]);
        Session::flash('newsletter', "Thanks to Submit our Newsletter...");
        return redirect()->back();
    }
    public function forget_password(Request $request){
        $email = $request->input('subscribe_email');


        $users = DB::table('lr_user_register')->where('email_id', $request->email)->get();

                    if(count($users) == 1)
                    {
                      Session::put('user_id', $users[0]->id);
                      
                    $data = [
                    'email' => $email
                    ];

                    $emailSubject = 'Place Subject Line Here ';

                    Mail::send('resetmail', $data, function ($message) use ($data) {
                        $message->from('noreply@allcodingworld.com');
                        $message->subject('Reset Password');
                        $message->to($data['email']);
                    });

                    return redirect()->back();
                      
                    }
                    else {
                      return redirect()->back();
                    }
    }

  public function submitcontact(Request $request){
            $validator = Validator::make($request->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/contact')
                        ->withErrors($validator)
                        ->withInput();
        }
        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $message = $request->input('message');//message
        $name = $fname . ' ' . $lname;
        $data = array('name'=>$name, 'email'=>$email, 'subject'=>$subject, 'message'=>$message);
   
      /*Mail::send(['text'=>'templates.contact_mail'], $data, function($message) {
         $message->to('laxman091@gmail.com', 'Indiancitymarket')->subject
            ('Contact us mail');
         $message->from('shashikantmishra075@gmail.com','Indiancitymarket');
      });*/
      //$data = array('name'=>$name);
   
      //Mail::send(['text'=>'templates.contact_mail'], $data, function($message) use ($data) {
      Mail::send('templates.contact_mail', $data, function ($message) use ($data) {
        $message->from('no-reply@indiancitymarket.com');
        $message->subject('Contact Us Email');
        $message->to('webcodeeducation@gmail.com');
      });
      Session::flash('alert-success', "Thankyou so much. Our representative contact you soon.");
        return redirect()->back();
    }

    public function resetpassword(Request $request){
        $email = $request->input('email');
        $data = array('name'=>'Indiancitymarket', 'email'=>$email);
        $count = Users::where('email', '=', $email)->count();
        if($count == 1){
                    Mail::send('templates.resetmail', $data, function ($message) use ($data) {
                        $message->from('noreply@indiancitymarket.com');
                        $message->subject('Reset Password');
                        $message->to('laxman091@gmail.com');
                    });
                    Session::flash('alert-success', "Mail Sent successfully.");
        }else{
                    Session::flash('alert-warning', "Email not registered with our domain.");
        }
        return redirect()->back();
    }
    public function generate_shop_account(Request $request){
      $fake = $request->input('fake_email');
      $number = $request->input('shop_number');
        $email = $request->input('email');
        $password = $request->input('password');
        $password1 = bcrypt($password);
        $data = array('name'=>$number, 'email'=>$email, 'password'=>$password);
        $email1 = $email;
      if(isset($fake)){
      Mail::send('templates.shop_subscribe_mail', $data, function ($message) use ($data) {
            $message->from('no-reply@indiancitymarket.com');
            $message->subject('Shop Registeration Email');
            $message->to('laxman091@gmail.com');
            $message->cc('shashikantmishra075@gmail.com');
        });
        
      }else{
        Mail::send('templates.shop_subscribe_mail', $data, function ($message) use ($data) {
            $message->from('no-reply@indiancitymarket.com');
            $message->subject('Shop Registeration Email');
            $message->to('laxman091@gmail.com');
            $message->cc('shashikantmishra075@gmail.com');
        });
      }
      JyantiShops::where('shop_number', '=', $number)->update(['shop_email'=>$email]);
      $check = Users::where('email', '=', $email)->first();
            if ($check === null) {
                    // user doesn't exist
                    $usr = new Users;
                    $usr->name = 'Shop' . $number;
                    $usr->username = 'shop' . $number;
                    $usr->email = $email;
                    $usr->password = $password1;
                    $usr->user_role = 3;
                    $usr->isactive = 1;
                    $usr->save();
            }else{
                Users::where('email', '=', $email)->update(['password' => $password1, 'isactive'=> 1]);
               $msg = 'Shop Updated Successfully';
            }
      $msg = 'Shop Added Successfully';
      Session::flash('alert-success', $msg);
      return redirect()->back();
    }
} 
