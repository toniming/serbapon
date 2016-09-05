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
	  	  $kupon                              	   	= Kupon::find($id);
	  	  $input                                   	= Input::only('quantity','sub_price');
	  	  $chart 								   	= new Chart();

	  	  $chart->id_user					   	   	= session('id');
	  	  $chart->id_kupon							= $kupon->_id;
	  	  $chart->title 						   	= $kupon->title;
	  	  $chart->images 						   	= $kupon->images;
	  	  $chart->price 							= $kupon->price;
	  	  $chart->quantity 						   	= $input['quantity'];
	  	  $chart->sub_price 					   	= (int)$input['sub_price'];
	  	  //dd($chart->title);
	      $chart->save();
	      
	      //return Redirect::to('/chart/pembelian');
	      return Redirect::to('/metode_pembayaran');
	    }
	}

	public function chartView(){
        $chart1             						= new Chart();
        $chart             	 						= $chart1::all();
		//return View::make('web.page.chart.chart')->with('chart',$chart);
		return Redirect::to('/chart/pembelian');
	}

	public function chartDelete($id){
		$chart                      				= Chart::find($id)->delete();
		//return Redirect::to('/chart/pembelian');
	      return Redirect::to('/metode_pembayaran');
		//$chart                      = Chart::truncate(); <<< method untuk hapus semua chart
	}

	public function payment_method(){
		$kupon1             								= new Chart();
        $kupon              								= $kupon1::all();
        $id_nota = date('YmdHis');
        session(['id_nota' => $id_nota]);
		return View::make('web.page.chart.payment_method')->with('kupon',$kupon);
	}

	public function payment_confirmation($total){
		$chart 	             								= Chart::all();
		$transaction 										= new Transaction();
		

    	$transaction->id_user					   	   		= session('id');
	  	$transaction->id_notaa						   		= session('id_nota');
	  	$transaction->sum_price 					   		= $total;
	  	$transaction->date_buy 						   		= date('Y-m-d H:m:s');
	  	$transaction->status  								= 'Belum Transfer';
	  	//dd($chart->title);
	    $transaction->save();

		$transaction1 								   		= $transaction::all();

		foreach($chart as $charts){
	        if(session('id') == $charts->id_user){
				$detail_transaction 						= new Detail_Transaction();
			    $detail_transaction->id_user				= session('id');
			  	$detail_transaction->id_nota				= session('id_nota');
			  	$detail_transaction->id_kupon				= $charts->id_kupon;
			  	$detail_transaction->quantity				= $charts->quantity;	  	
			  	$detail_transaction->sub_price 				= $charts->sub_price;
			  	$detail_transaction->date_buy 				= date('Y-m-d H:m:s');
			  	//dd($chart->title);
			    $detail_transaction->save();
			}
		}

	    foreach($chart as $charts){
	        if(session('id') == $charts->id_user){
	          $charts->delete();
	        	}
    	}

	    $id_trans 									   	= $transaction->_id;
	    return View::make('web.page.chart.payment_confirmation')->with(['transaction1' => $transaction1, 'id_trans' => $id_trans]);
	       
	}

	public function payment_upload($id_nota){
		$detail_transaction 						   	= Detail_Transaction::all();
		$transaction 		   						   	= Transaction::all();
		$input                                   	   	= Input::only('desti_bank','bank','name_send','images');

		foreach($transaction as $transactions){
		        if($id_nota == $transactions->id_notaa){


					$transactions->desti_bank				= $input['desti_bank'];

				  	$file= Input::file('images');
			        Input::file('images')->move('C:\xampp\htdocs\serbaponbackend\public\images',Input::file('images')->getClientOriginalName());
			        $transactions->images                   = $input['images'];
				  	$transactions->bank  				    = $input['bank'];
				  	$transactions->name_send 				= $input['name_send'];
				  	$transactions->status  					= 'Menunggu Konfirmasi';

				  	$transactions->save();

				  	return Redirect::to('/');
				}
		}
	}
}
	  	