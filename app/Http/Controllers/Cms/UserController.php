<?php

namespace app\Http\Controllers\Cms;

use app\Http\Controllers\BaseController;
use app\Model\User;
use Request, Input, URL, Redirect, View, Session;

class UserController extends BaseController
{
    // init
    protected $view_root    = 'cms.pages';
    protected $page_title   = 'user';
    protected $breadcrumb   = [];

    public function index()
    {
        $datas                                  = User::paginate(10);
        $this->page_datas->datas                = $datas;
        $this->page_datas->id                   = null;
        //page attributes
        $this->page_attributes->page_title      = $this->page_title;
        //generate view
        $view_source                            = $this->view_root . '.users.index';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    public function create($id = null)
    {
        //get data
        $datas                                  = null;
        
        if($id != null){
            $datas                              = User::find($id);
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
        $view_source                            = $this->view_root . '.users.create';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }

    public function store($id = null)
    {
        //get input
        $input                                 = Input::only('name','email', 'password', 'dob', 'role','status', 'sex');
        //create or edit
        $user                                  = User::findOrNew($id);
        //save data
        $user->name                            = $input['name'];
        $user->email                           = $input['email'];
        $user->password                        = hash('md5',$input['password']);
        $user->dob                             = $input['dob'];
        $user->role                            = $input['role'];
        $user->status                          = $input['status'];
        $user->sex                             = $input['sex'];
        $user->published_at                    = date('Y-m-d H:m:s');
        
        $user->save();
        $this->page_attributes->msg             = 'Data telah disimpan';
        return Redirect::to('/cms/user/user')->with('msg', 'Data telah disimpan.');
    }

    public function show($id)
    {
        //get data
        $datas                                  = User::find($id);
        $this->page_datas->datas                = $datas;
        $this->page_datas->id                   = $id;
        //page attributes
        $this->page_attributes->page_title      = 'Detail ' . $this->page_title;
        //generate view
        $view_source                            = $this->view_root . '.users.show';
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
        $user                      = User::find($id)->delete();

        $this->page_attributes->msg = 'Data telah dihapus.';
        return Redirect::to('/cms/user/user')->with('msg', 'Data telah disimpan.');
    }

    function login(Request $request){
        $user1 = new User();
        $user = $user1::all();
        return View::make('cms.pages.users.LOGIN')->with(['user' => $user]);
    }

    public function logout(){
          Session::forget('Admin');
          Session::forget('email_admin');
          Session::forget('Editor');
          Session::forget('email_editor');
          return Redirect::to('/cms/login');
    }

    function loginProcAdmin(){
        $user1          = new User();
        $user           = Input::all();
        $login   = $user1::where('email', $user['email'])->where('password', hash('md5',$user['password']))->where('role','Admin')->count();
         if($login > 0){
            session(['Admin' => 'true', 'email_admin' => $user['email']]);
            return Redirect::to('/cms');
        }
          else
            return Redirect::to('/cms/login')->with('message-danger', "Login gagal, pastikan username dan password anda benar.");
    }

    function loginProcEditor(){
        $user1          = new User();
        $user           = Input::all();
        $login   = $user1::where('email', $user['email'])->where('password', hash('md5',$user['password']))->where('role','Editor')->count();
         if($login > 0){
            session(['Editor' => 'true', 'email_editor' => $user['email']]);
            return Redirect::to('/cms');
         }   
          else
            return Redirect::to('/cms/login')->with('message-danger', "Login gagal, pastikan username dan password anda benar.");
    }

    public function search(){
        $search_result                          = User::where('email', 'like', '%'.Input::get('search').'%')
                                                    ->paginate();
        $this->page_datas->datas                = $search_result;
        $this->page_datas->id                   = null;
        //page attributes
        $this->page_attributes->page_title      = 'Search Result: '.Input::get('search');
        //generate view
        $view_source                            = $this->view_root . '.users.index';
        $route_source                           = Request::route()->getName();        
        return $this->generateView($view_source , $route_source);
    }
}
