<?php

namespace app\Http\Controllers\Cms;

use app\Http\Controllers\BaseController;
use app\Model\web_config;
use Request, Input, URL, Redirect;

class FAQController extends BaseController
{
    // init
    protected $view_root    = 'cms.pages.FAQ';
    protected $page_title   = 'FAQ';
    protected $breadcrumb   = [];

    public function index()
    {
        $datas                                  = web_config::where('type','FAQ')->paginate(10);
        $this->page_datas->datas                = $datas;
        $this->page_datas->id                   = null;
        //page attributes
        $this->page_attributes->page_title      = $this->page_title;
        //generate view
        $view_source                            = $this->view_root . '.index';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
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
        $input                                  = Input::only('pertanyaan','jawaban');
        //create or edit
        $FAQ                                    = web_config::findOrNew($id);
        //save data
        $FAQ->content                           = ['pertanyaan' => $input['pertanyaan'],
                                                    'jawaban' => $input['jawaban']
                                                  ];
        
        $FAQ->type                              = 'FAQ';
        $FAQ->save();
        $this->page_attributes->msg             = 'Data telah disimpan';
        return Redirect::to('/cms/FAQ/FAQ')->with('msg', 'Data telah disimpan.');
    }

    public function show($id)
    {
        //get data
        $datas                                  = web_config::find($id);
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
        $FAQ                      = web_config::find($id)->delete();

        $this->page_attributes->msg = 'Data telah dihapus.';
        return Redirect::to('/cms/FAQ/FAQ')->with('msg', 'Data telah disimpan.');
    }
}
