<?php

namespace app\Http\Controllers\Cms;

use app\Http\Controllers\BaseController;
use Request;



class DashboardController extends BaseController 
{
	/**
	 * [home description]
	 * @return [type] [description]
	 */
	
	// init
	protected $view_root	= 'cms.pages';
	protected $page_title	= 'Dashboard';
	protected $breadcrumb 	= [];

	public function home()
	{
		$this->page_attributes->page_title 		= $this->page_title;

		$view_source 	= $this->view_root . '.dashboard.overview';
		$route_source 	= Request::route()->getName();

		return $this->generateView($view_source, $route_source);
	}

	public function website(){
		$this->page_attributes->page_title 		= 'crm';

		$view_source 	= $this->view_root . '.website.website';
		$route_source 	= Request::route()->getName();

		return $this->generateView($view_source, $route_source);
	}

	public function crm(){
		$this->page_attributes->page_title 		= 'crm';

		$view_source 	= $this->view_root . '.crm.crm';
		$route_source 	= Request::route()->getName();

		return $this->generateView($view_source, $route_source);
	}
}