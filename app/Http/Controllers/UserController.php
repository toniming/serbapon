<?php

namespace app\Http\Controllers;

use app\Model\User;
use app\Http\Controllers\Controller;
use app\Model\Web\Transaction;
use app\Model\Web\Kupon;
use app\Model\Web\Chart;
use app\Model\Web\Detail_Transaction;

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
        $user11         = User::all();
        $user           = Input::all();
        $kupon          = Kupon::all();
        $chart          = Chart::all();
        $now            = date('Y-m-d H:m:s');
        $login          = $user1::where('email', $user['email'])->where('password', hash('md5',$user['password']))->where('role', 'User')->count();
          if($login > 0){
            $data_user = $user1::where('email', $user['email'])->where('password', hash('md5',$user['password']))->where('role', 'User')->where('status', "Aktif")->count();
              if($data_user == 0){
                return Redirect::to('/signin')
                  ->with('message-danger', "Anda belum melakukan aktivasi email, silahkan melakukan aktivasi email terlebih dahulu.");
              }
              else{
                //$string = str_random(40);
                foreach($kupon as $kupons){
                  if($kupons['end'] < $now){
                    foreach($chart as $charts){
                      if($charts['id_kupon'] == $kupons['_id']){
                        $charts->delete();
                      }
                    }
                  }
                }

                foreach($user11 as $user11s){
                  if($user['email'] == $user11s->email){
                  session(['User' => 'true', 'email' => $user['email'],'id' => $user11s->_id]);
                  return Redirect::to('/');
              }
            }
          }
        }
          else
            return Redirect::to('/signin')->with('message-danger', "Login gagal, pastikan username dan password anda benar.");
    }

   public function logout(){
          Session::forget('User');
          Session::forget('email');
          Session::forget('id');
          return Redirect::to('/');
   }

    public function create($id = null){
        $input                                 = Input::only('name','email', 'password', 'dob', 'role','status', 'sex','id');
        //create or edit
        $user                                  = User::findOrNew($id);
        $users                                 = User::all();


        foreach($users as $users1){
          if($input['email'] == $users1->email){
              return Redirect::to('/signin')->with('message-danger2', "email sudah digunakan, silahkan coba email lainnya");
          }
        }
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
            Mail::send('web/email/email',$data, function($message) 
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

    public function profil(){
      $data                             = User::all();
      $transaction                      = Transaction::all();

      foreach($data as $datas){
        if(session('email') == $datas->email){
          $user = $datas;
          return View::make('web.page.info_profil')->with(['user' => $user, 'transaction' =>  $transaction]);
        }
    }
  }

    public function update($id)
    {
        //get input
        $input                                 = Input::only('name','email', 'dob','sex','password_lama','password');
        //create or edit
        $user                                  = User::findOrNew($id);
        //save data
        $user->name                            = $input['name'];
        $user->email                           = $input['email'];
        $user->dob                             = $input['dob'];
        $user->sex                             = $input['sex'];
        $user->published_at                    = date('Y-m-d H:m:s');
        
        $user->save();
        return Redirect::to('/profil')->with('msg', 'Data telah disimpan.');
    }

    public function update_password($id){
        $input                                 = Input::only('password_lama','password');
        //create or edit
        $user                                  = User::findOrNew($id);
        //save data
        $ubah_pass                             = $user::where('password', hash('md5',$input['password_lama']))->where('_id', $id)->count();
        if($ubah_pass > 0){
            $user->password                    = hash('md5',$input['password']);
            $user->save();
            return Redirect::to('/profil')->with('message-success', "Ubah password Berhasil");
        }
        else{
            return Redirect::to('/profil')->with('message-danger', "Ubah password gagal. password lama anda salah");
        }
    }

    public function payment_detail($id_notaa){
      $detail_transaction                      = Detail_Transaction::all();
      $kupon                                   = Kupon::all();
      return View::make('web.page.payment_detail')->with(['id_notaa' => $id_notaa, 'detail_transaction' =>  $detail_transaction, 'kupon' => $kupon]);
    }

    public function payment_upload($id){
        $transaction                           = Transaction::find($id);
        if($transaction->status == 'Konfirmasi'){
            return Redirect::to('/konfirmasi/berhasil');
        }
        else{
            return View::make('web.page.payment_confirmation')->with(['transactions' => $transaction]);
        }
    }

    public function confirmation_done(){
      return View::make('web.page.konfirmasi_kupon_done');
    }

    public function payment_process_upload($id_nota){
    $transaction                               = Transaction::all();
    $input                                     = Input::only('desti_bank','bank','name_send','images');

    foreach($transaction as $transactions){
            if($id_nota == $transactions->id_notaa){


          $transactions->desti_bank       = $input['desti_bank'];

            $file= Input::file('images');
            $extension = Input::file('images')->getClientOriginalExtension();
            $fileName = date('YmdHis')+rand(11111,99999).'.'.$extension;
              Input::file('images')->move('C:\xampp\htdocs\serbaponbackend\public\images',$fileName);
            $transactions->images                   = $fileName;
            $transactions->bank             = $input['bank'];
            $transactions->name_send        = $input['name_send'];
            $transactions->status           = 'Menunggu Konfirmasi';

            $transactions->save();

            return Redirect::to('/profil');
        }
    }
  }
}