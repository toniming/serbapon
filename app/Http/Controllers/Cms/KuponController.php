<?php

namespace app\Http\Controllers\Cms;

use app\Http\Controllers\BaseController;
use app\Model\Kupon;
use Request, Input, URL, Redirect;

class KuponController extends BaseController
{
    // init
    protected $view_root    = 'cms.pages';
    protected $page_title   = 'kupon';
    protected $breadcrumb   = [];

    public function index()
    {
        $datas                                  = Kupon::paginate(10);
        $this->page_datas->datas                = $datas;
        $this->page_datas->id                   = null;
        //page attributes
        $this->page_attributes->page_title      = $this->page_title;
        //generate view
        $view_source                            = $this->view_root . '.kupon.kupon.index';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    public function create($id = null)
    {
        //get data
        $datas                                  = null;
        
        if($id != null){
            $datas                              = Kupon::find($id);
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
        $view_source                            = $this->view_root . '.kupon.kupon.create';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    public function store($id = null)
    {
        //get input
        $input                                   = Input::only('title','images','category','location', 'email_mine' ,'description','start','end', 'sell', 'old_price', 'price');
        //create or edit
        $kupon                                   = Kupon::findOrNew($id);

        $quantiti                                = '0';
        //save data
        $kupon->title                            = $input['title'];
        if($kupon->images == null){
            $file= Input::file('images');
            Input::file('images')->move('C:\xampp\htdocs\serbaponbackend\public\images',Input::file('images')->getClientOriginalName());
            $kupon->images                       = $input['images'];
        }
        else if(Input::file('images') != null){
            $file= Input::file('images');
            Input::file('images')->move('C:\xampp\htdocs\serbaponbackend\public\images',Input::file('images')->getClientOriginalName());
            $kupon->images                       = $input['images'];
        }
        $kupon->category                         = $input['category'];
        $kupon->location                         = $input['location'];
        $kupon->email_mine                       = $input['email_mine'];
        $kupon->description                      = $input['description'];
        $kupon->start                            = $input['start'];
        $kupon->end                              = $input['end'];
        $kupon->sell                             = (int)$quantiti;
        $kupon->old_price                        = $input['old_price'];
        $kupon->price                            = (int)$input['price'];
        $kupon->published_at                     = date('Y-m-d H:m:s');
        
        $kupon->save();
        $this->page_attributes->msg             = 'Data telah disimpan';
        return Redirect::to('/cms/kupon/kupon')->with('msg', 'Data telah disimpan.');
    }

    public function show($id)
    {
        //get data
        $datas                                  = Kupon::find($id);
        $this->page_datas->datas                = $datas;
        $this->page_datas->id                   = $id;
        //page attributes
        $this->page_attributes->page_title      = 'Detail ' . $this->page_title;
        //generate view
        $view_source                            = $this->view_root . '.kupon.kupon.show';
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
        $kupon                      = Kupon::find($id)->delete();

        $this->page_attributes->msg = 'Data telah dihapus.';
        return Redirect::to('/cms/kupon/kupon')->with('msg', 'Data telah disimpan.');
    }

    public function search(){
        $search                                 = Kupon::where('title', 'like', '%'.Input::get('search').'%')
                                                    ->paginate();
        $this->page_datas->datas                = $search;
        $this->page_datas->id                   = null;
        //page attributes
        $this->page_attributes->page_title      = 'Search Result: '.Input::get('search');
        //generate view
        $view_source                            = $this->view_root . '.kupon.kupon.index';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }
}
