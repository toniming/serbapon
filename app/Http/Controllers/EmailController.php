<?php

namespace app\Http\Controllers;

use app\Http\Controllers\Controller;
use Mail;
use Request;
use Input;
use DB;
use Redirect;
use Session;
use View;

class EmailController extends Controller
{
    public function confirm(){
      $data = array(
          'name' => "Welcome to serbapon",
          'id'   => "57b2757fcabd4320bc006711",
      );
      $email = Input::get('email');
      Mail::send('web/page/email',$data, function($message) 
      use($email)
      {
        $message->to($email)->subject('Konfirmasi User Serbapon.id');
      });

      return Redirect::to('/signin');
    }
}