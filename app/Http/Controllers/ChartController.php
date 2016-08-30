<?php

namespace app\Http\Controllers;

use app\Model\Web\Chart;
use app\Model\Web\Kupon;
use app\Model\Web\Transaction;
use app\Model\Web\Detail_Transaction;
use app\Http\Controllers\BaseController;

use Request;
use Input;
use DB;
use Redirect;
use Session;
use View;
class ChartController extends BaseController
{
  protected $view_root  = 'web.page.chart';
  protected $page_title = 'Chart Pembelian';
  protected $breadcrumb   = [];

  public function chart($id) {
	  	if(is_null(session('User'))){
	  		return Redirect::to('/signin');
	  	}
	  	else{
	  	  $kupon                              	   = Kupon::find($id);
	  	  $input                                   = Input::only('quantity','sum_price');
	  	  $chart 								   = new Chart();

	  	  $chart->id_user					   	   = session('id');
	  	  $chart->title 						   = $kupon->title;
	  	  $chart->images 						   = $kupon->images;
	  	  $chart->price 						   = $kupon->price;
	  	  $chart->quantity 						   	= $input['quantity'];
	  	  $chart->sum_price 					   	= (int)$input['sum_price'];
	  	  //dd($chart->title);
	      $chart->save();
	      
	      return Redirect::to('/chart/pembelian');
	    }
	}

	public function chartView(){
        $kupon1             						= new Chart();
        $kupon             	 						= $kupon1::all();
		return View::make('web.page.chart.chart')->with('kupon',$kupon);
	}

	public function chartDelete($id){
		$chart                      				= Chart::find($id)->delete();
		return Redirect::to('/chart/pembelian');
		//$chart                      = Chart::truncate(); <<< method untuk hapus semua chart
	}

	public function payment_method(){
		$kupon1             						= new Chart();
        $kupon              						= $kupon1::all();
        $id_nota = date('YmdHis');
        session(['id_nota' => $id_nota]);
		return View::make('web.page.chart.payment_method')->with('kupon',$kupon);
	}

	public function payment_confirmation($total){
		$kupon1             						= Chart::all();
		$detail_transaction 						= new Detail_Transaction();
		$transaction 								= new Transaction();
		foreach($kupon1 as $kupon1s){
	        if(session('id') == $kupon1s->id_user){
	          $kupon1s->delete();
	        	}
    	}

    	$transaction->id_user					   	   	= session('id');
	  	$transaction->id_notaa						   	= session('id_nota');
	  	$transaction->sum_price 					   	= $total;
	  	$transaction->date_buy 						   	= date('Y-m-d H:m:s');
	  	//dd($chart->title);
	    $transaction->save();

		$transaction1 								   	= $transaction::all();
	    $detail_transaction->id_user				   	= session('id');
	  	$detail_transaction->id_nota				   	= session('id_nota');
	  	$detail_transaction->sum_price 				   	= $total;
	  	$detail_transaction->date_buy 				   	= date('Y-m-d H:m:s');
	  	//dd($chart->title);
	    $detail_transaction->save();
	    $id_trans 									   	= $transaction->_id;
	    return View::make('web.page.chart.payment_confirmation')->with(['transaction1' => $transaction1, 'id_trans' => $id_trans]);
	       
	}

	public function payment_upload($id_nota){
		$detail_transaction 						   	= Detail_Transaction::all();
		$transaction 		   						   	= Transaction::all();
		$input                                   	   	= Input::only('desti_bank','bank','name_send','images');

		foreach($detail_transaction as $detail_transactions){
			foreach($transaction as $transactions){
		        if($detail_transactions->id_nota == $transactions->id_notaa){


					$transactions->desti_bank				= $input['desti_bank'];

				  	$file= Input::file('images');
			        Input::file('images')->move('C:\xampp\htdocs\serbaponbackend\public\images',Input::file('images')->getClientOriginalName());
			        $transactions->images                   = $input['images'];
				  	$transactions->bank  				    = $input['bank'];
				  	$transactions->name_send 				= $input['name_send'];

				  	$transactions->save();

				  	return Redirect::to('/');
				}
			}
		}
	}
}
	  	