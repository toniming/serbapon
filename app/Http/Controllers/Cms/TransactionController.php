<?php

namespace app\Http\Controllers\Cms;

use app\Http\Controllers\BaseController;
use app\Model\Web\Transaction;
use app\Model\Web\Detail_Transaction;
use app\Model\Web\Kupon;
use app\Model\User;
use Request, Input, URL, Redirect, View, Mail, DB, Session;

class TransactionController extends BaseController
{
    // init
    protected $view_root    = 'cms.pages';
    protected $page_title   = 'transaction';
    protected $breadcrumb   = [];

    public function index()
    {
        $datas                                  = Transaction::paginate(10);
        $user                                   = User::all();
        $search_result                          = null;
        $this->page_datas->users                = $user;
        $this->page_datas->datas                = $datas;
        $this->page_datas->id                   = null;
        //page attributes
        $this->page_attributes->page_title      = $this->page_title;
        //generate view

        $view_source                            = $this->view_root . '.transaction.transaction.index';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source, $search_result);
    }

    public function create($id = null)
    {
        //get data
        $datas                                  = null;
        
        if($id != null){
            $datas                              = Transaction::find($id);
        }
        //set data
        $this->page_datas->datas                = $datas;
        //page attributes
        if($id != null){
            $this->page_attributes->page_title  = 'Edit '. $this->page_title;
        }else{
            $this->page_attributes->page_title  = $this->page_title . ' Baru';
        }
        $this->page_datas->id                   = $id;
        //generate view
        $view_source                            = $this->view_root . '.transaction.transaction.create';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    public function store($id = null)
    {
        //get input
        $input                                   = Input::only('title','images','category','location', 'description','start','end', 'sell', 'old_price', 'price');

        //create or edit
        $transaction                                   = Transaction::findOrNew($id);
        //save data
        $transaction->title                            = $input['title'];
        if($transaction->images == null){
            $file= Input::file('images');
            Input::file('images')->move('C:\xampp\htdocs\serbaponbackend\public\images',Input::file('images')->getClientOriginalName());
            $transaction->images                       = $input['images'];
        }
        else if(Input::file('images') != null){
            $file= Input::file('images');
            Input::file('images')->move('C:\xampp\htdocs\serbaponbackend\public\images',Input::file('images')->getClientOriginalName());
            $transaction->images                       = $input['images'];
        }
        $transaction->category                         = $input['category'];
        $transaction->location                         = $input['location'];
        $transaction->description                      = $input['description'];
        $transaction->start                            = $input['start'];
        $transaction->end                              = $input['end'];
        $transaction->sell                             = $input['sell'];
        $transaction->old_price                        = $input['old_price'];
        $transaction->price                            = (int)$input['price'];
        $transaction->published_at                     = date('Y-m-d H:m:s');
        
        $transaction->save();
        $this->page_attributes->msg             = 'Data telah disimpan';
        return Redirect::to('/cms/transaction/transaction')->with('msg', 'Data telah disimpan.');
    }

    public function show($id)
    {
        //get data
        $datas                                  = Transaction::find($id);
        $user                                   = User::all();

        $this->page_datas->users                = $user;
        $this->page_datas->datas                = $datas;
        $this->page_datas->id                   = $id;
        //page attributes
        $this->page_attributes->page_title      = 'Detail ' . $this->page_title;
        //generate view
        $view_source                            = $this->view_root . '.transaction.transaction.show';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    public function edit($id)
    {
        return $this->create($id);
    }

    public function update($id = null)
    {
        return $this->store($id);
    }

    public function destroy($id)
    {
        $transaction                      = Transaction::find($id);
        $detail_transaction               = Detail_Transaction::all();

        foreach($detail_transaction as $detail){
            if($transaction->id_notaa == $detail->id_nota){
                $detail->delete();
            }
        }
        $transaction                      = Transaction::find($id)->delete();

        $this->page_attributes->msg = 'Data telah dihapus.';
        return Redirect::to('/cms/transaction/transaction')->with('msg', 'Data telah disimpan.');
    }

    public function confirmation($id)
    {
        $transaction                                    = Transaction::findOrNew($id);
        $transactions                                   = Transaction::all();
        $Detail_Transaction                             = Detail_Transaction::all();
        $kupon                                          = Kupon::all();
        $user                                           = User::all();
        $id_nota                                        = $transaction->id_notaa;
        foreach($Detail_Transaction as $detail){
            if($transaction->id_notaa == $detail->id_nota){
                $detail->kode_kupon                     = date('YmdHis')+rand(100,1000);
                $detail->save();
                foreach($kupon as $kupons){
                    if($detail->id_kupon == $kupons->_id){
                        $email_owner    = $kupons->email_mine;
                        $data = array(
                                'detail_transaction' => $detail,
                                'kupon' => $kupons,
                        );
                        Mail::send('web/email/email_kupon_owner',$data, function($message) 
                        use($email_owner)
                        {
                            $message->to($email_owner)->subject('KUPON ANDA LAKU');
                        });
                        $kupons->sell                                  += $detail->quantity;
                        $kupons->save();
                    }
                }
            }
        }


        $transaction->status                            = 'Konfirmasi';
        $transaction->save();

        foreach($transactions as $transactionss){
            foreach($user as $users){
                if($users->id == $transactionss->id_user){
                    $username = $users->name;
                    $email    = $users->email;
                }
            }
        }

        $data = array(
                'name' => $username,
                'detail_transaction' => $Detail_Transaction,
                'kupon' => $kupon,
                'id_nota' =>$id_nota,
        );
        Mail::send('web/email/email_kupon',$data, function($message) 
        use($email)
        {
            $message->to($email)->subject('PEMBELIAN KUPON BERHASIL');
        });

        $this->page_attributes->msg             = 'Data telah disimpan';
        return Redirect::to('/cms/transaction/transaction')->with('msg', 'konfirmasi transaksi berhasil.');
    }

    public function showdetail($id_nota)
    {
      $detail_transaction                      = Detail_Transaction::all();
      $kupon                                   = Kupon::all();
      return View::make('cms.pages.transaction.transaction.showDetail')->with(['id_nota' => $id_nota, 'detail_transaction' =>  $detail_transaction, 'kupon' => $kupon]);
    }

    public function search()
    {
        $search_result                          = Transaction::where('status', 'like', '%'.Input::get('search').'%')
                                                    ->paginate();
        $user                                   = User::all();
        $this->page_datas->users                = $user;
        $this->page_datas->datas                = $search_result;
        $this->page_datas->id                   = null;
        //page attributes
        $this->page_attributes->page_title      = 'Search Result: '.Input::get('search');
        //generate view
        $view_source                            = $this->view_root . '.transaction.transaction.index';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source, $search_result);
    }
}
