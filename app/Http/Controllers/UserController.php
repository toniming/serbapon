<?php

namespace app\Http\Controllers;

use app\Model\User;
use app\Http\Controllers\Controller;

use Mail;
use Request;
use Input;
use DB;
use Redirect;
use Session;
use View;

class UserController extends Controller
{   
    public function login(){
        $user1          = new User();
        $user           = Input::all();
        $login          = $user1::where('email', $user['email'])->where('password', hash('md5',$user['password']))->where('role', 'User')->count();
          if($login > 0){
            $data_user = $user1::where('email', $user['email'])->where('password', hash('md5',$user['password']))->where('role', 'User')->where('status', "Aktif")->count();
              if($data_user == 0){
                return Redirect::to('/signin')
                  ->with('message-danger', "Anda belum melakukan aktivasi email, silahkan melakukan aktivasi email terlebih dahulu.");
              }
              else{
                session(['User' => 'true', 'email' => $user['email']]);
                return Redirect::to('/');
              }
          }
          else
            return Redirect::to('/signin')->with('message-danger', "Login gagal, pastikan username dan password anda benar.");
    }

   public function logout(){
          session()->flush();
          return Redirect::to('/');
   }

    public function create($id = null){
        $input                                 = Input::only('name','email', 'password', 'dob', 'role','status', 'sex','id');
        //create or edit
        $user                                  = User::findOrNew($id);
        //save data
        if(($input['name']) == ""|| ($input['email']) == "" || ($input['password']) == "" || ($input['dob']) == ""){
          return Redirect::to('/signin')->with('message-danger2', "Lengkapi Data Anda");
        }
        else{
            $user->name                            = $input['name'];
            $user->email                           = $input['email'];
            $user->password                        = hash('md5',$input['password']);
            $user->dob                             = $input['dob'];
            $user->sex                             = $input['sex'];
            $user->role                            = 'User';
            $user->status                          = 'Belum_Aktif';
            $user->published_at                    = date('Y-m-d H:m:s');
            
            $user->save();

            //dd($input['name']);
        
        
            $data = array(
                'name' => Input::get('name'),
                'id'   => $user->_id,
            );
            $email = Input::get('email');
            Mail::send('web/page/email',$data, function($message) 
            use($email)
            {
              $message->to($email)->subject('Konfirmasi User Serbapon.id');
            });
            return Redirect::to('/')->with('message-success', "Silahkan Aktivasi Email Anda");
        }
    }

    public function registrasi($id){
         $user1  = new User();
         $user   = User::findOrNew($id);
         $user->status  = 'Aktif';
         $user->save();
         return View::make('web.page.aktivasi');
    }
}