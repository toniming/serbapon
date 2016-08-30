<?php

namespace app\Http\Controllers;

use app\Http\Controllers\BaseController;
use Request, Redirect, Input, Mail, View;
use app\Model\User;


class ForgotController extends BaseController 
{
	/**
	 * [home description]
	 * @return [type] [description]
	 */
	
	// init
	protected $view_root	= 'web.page';
	protected $page_title	= 'Reset';
	protected $breadcrumb 	= [];

	public function forgot() {
        $input                                  	= Input::only('email');
        $user1                              		= new User();
        //save data

		$email = $input['email'];
        $data 	 =    User::all();
    	foreach($data as $datas){
    	if($email == $datas->email){
	        $dataaa = array(
	                'id'   => Input::get('email'),
	            );
		    Mail::send('web/email/email_reset',$dataaa, function ($message) 
		    use($email){
		        $message->to($email)->subject('Reset Password');
		    });
		    return Redirect::to('/forgotsend/'.$email);
		}
		else
			return Redirect::to('/signin')->with('non_akun','Anda belum memiliki akun silahkan membuat akun terlebih dahulu');
		}
	}

	public function forgot_view()
	{
		return View::make('web.page.forgotpass');
	}

	public function forgot_send($email)
	{
		return View::make('web.page.notifreset')->with('email',$email);
	}

	public function reset_view()
	{
		return View::make('web.page.reset_email');
	}

	public function reset() {
		//update db
        $input                                 = Input::only('email', 'password');
        //create or edit
        $email=$input['email'];
    	$data 	=    User::all();
    	foreach($data as $datas){
    	if($email == $datas->email){
	        $datas->password                        = hash('md5',$input['password']);
	        $datas->published_at                    = date('Y-m-d H:m:s');
	        
	        $datas->save();
	        $this->page_attributes->msg             = 'Data telah disimpan';
		    return Redirect::to('/reset_success');
		}    
	    else
	    		return View::make('web.page.sign_in_sign_up');
    	}
        
	}
	public function reset_success(){
		//$this->page_attributes->page_title 		= $this->page_title;
		return View::make('web.page.success_change_pass');
	}
}