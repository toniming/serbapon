<?php

namespace app\Http\Controllers\Cms;

use app\Http\Controllers\BaseController;
use app\Model\web_config;
use Request, Input, URL, Redirect;

class AboutController extends BaseController
{
    // init
    protected $view_root    = 'cms.pages.About';
    protected $page_title   = 'About';
    protected $breadcrumb   = [];

    public function index()
    {
        $about                                  = web_config::where('type','About')->paginate(10);
        $this->page_datas->datas                = $about;
        $this->page_datas->id                   = null;
        //page attributes
        $this->page_attributes->page_title      = $this->page_title;
        //generate view

        $view_source                            = $this->view_root . '.index';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source)->with('kevin-gray',"sayang");
    }

    public function create($id = null)
    {
        //get data
        $datas                                  = null;
        
        if($id != null){
            $datas                              = web_config::find($id);
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
        $view_source                            = $this->view_root . '.create';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    public function store($id = null)
    {
        //get input
        $input                                    = Input::only('about');
        //create or edit
        $About                                    = web_config::findOrNew($id);
        //save data
        $About->content                           = ['About' => $input['about']
                                                  ];
        
        $About->type                              = 'About';
        $About->save();
        $this->page_attributes->msg             = 'Data telah disimpan';
        return Redirect::to('/cms/About/About')->with('msg', 'Data telah disimpan.');
    }

    public function show($id)
    {
        //get data
        $datas                                  = web_config::where('type','About')->find($id);
        $this->page_datas->datas                = $datas;
        $this->page_datas->id                   = $id;
        //page attributes
        $this->page_attributes->page_title      = 'Detail ' . $this->page_title;
        //generate view
        $view_source                            = $this->view_root . '.show';
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
        $About                      = web_config::find($id)->delete();

        $this->page_attributes->msg = 'Data telah dihapus.';
        return Redirect::to('/cms/About/About')->with('msg', 'Data telah disimpan.');
    }
}
