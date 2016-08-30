<?php

namespace app\Http\Controllers;

use app\Http\Controllers\BaseController;
use Request, Redirect, Input, Mail, View;
use app\Model\Web\Subscribe;


class SubscribeController extends BaseController 
{
	/**
	 * [home description]
	 * @return [type] [description]
	 */
	
	// init
	protected $view_root	= 'web.page';
	protected $page_title	= 'Subscribe';
	protected $breadcrumb 	= [];

	public function subscribe() {
        $input                                  = Input::only('email');
        $subscribe                              = new Subscribe();
        //save data
        $subscribe->email 						= $input['email'];
        $subscribe->name 						= $input['email'];
        $subscribe->is_subscribe 				= true;
        $subscribe->save();
        $subscribe->unsubscribe_token 			= $subscribe->_id;
        $subscribe->save();

        $data = array(
                'unsubscribe_token' => $subscribe->unsubscribe_token,
            );
		$email = Input::get('email');
	    Mail::send('web/email/email_subscribe',$data, function ($message) 
	    use($email){
	        $message->to($email)->subject('Berlangganan Serbapon.id');
	    });
	    return Redirect::to('/subscribe')->with('email', Input::get('email'));
	}

	public function subscribe_success()
	{
		return View::make('web.page.subscribe');
	}

	public function unsubscribe($unsubscribe_token) {
		//update db
        Subscribe::where('unsubscribe_token', $unsubscribe_token)->update(['is_subscribe' => false]);

        //kirim email unsubscribe
        $subscribe = Subscribe::where('unsubscribe_token', $unsubscribe_token)->get()['0']['attributes'];
        
        Mail::send('web/email/email_unsubscribe', ['email' => $subscribe['email']], function ($message) use ($subscribe){
	        $message->to($subscribe['email'])->subject('Berhenti Berlangganan Adapromo.id');
	    });

	    return Redirect::to('/unsubscribe');
	}
	public function unsubscribe_newsletter(){
		//$this->page_attributes->page_title 		= $this->page_title;

		return View::make('web.page.unsubscribe');
	}
}