<?php

namespace app\Http\Controllers;

use app\Model\Kupon;
use app\Http\Controllers\Controller;

use Request;
use Input;
use DB;
use Redirect;
use Session;
use View;

class HomeController extends Controller
{
    public function home(){
        $kupon1             = new Kupon();
        $kupon              = $kupon1::skip(0)->take(6)->get();
        return View::make('web.pages.home')->with(['kupon' => $kupon]);
    }
    public function kupon(){
        $kupon              = Kupon::paginate(12);
        return View::make('web.page.kupon')->with(['kupon' => $kupon]);
    }
    public function kupon_detail($id){
        $kupon1             = new Kupon();
        $related            = Kupon::paginate(3);
        $kupon=$kupon1::where('_id',$id)->get();//<<< method ini sama dengan kupon::find($id)
        return View::make('web.page.kupon_detail')->with(['kupon' => $kupon,'related' => $related]);



        /*$data = array(
            array('title' => 'Promo Ekstra Diskon Pembelian ASUS, ACER & Gigabyte', 
                  'isi' => 'Welcome To The Online Best Model Winner Contest At Look Of the Year. Welcome To The Online Best   Model Winner Contest At Look Of the Year. Welcome To The Online Best Model Winner Contest At Look Of the Year. Syarat dan Ketentuan Berlaku.')
            );
        $data = json_encode($data);
        $related = array(
            array('title' => 'Promo Ekstra Diskon Pembelian ASUS, ACER & Gigabyte', 
                  'isi' => 'Welcome To The Online Best Model Winner Contest At Look Of the Year. Syarat dan Ketentuan Berlaku.'),
            array('title' => 'Promo Ekstra Diskon Pembelian ASUS, ACER & Gigabyte', 
                  'isi' => 'Welcome To The Online Best Model Winner Contest At Look Of the Year. Syarat dan Ketentuan Berlaku.'),
            array('title' => 'Promo Ekstra Diskon Pembelian ASUS, ACER & Gigabyte', 
                  'isi' => 'Welcome To The Online Best Model Winner Contest At Look Of the Year. Syarat dan Ketentuan Berlaku.')
            );
        $related = json_encode($related);
        return View::make('web.page.promo_detail')->with(['data' => $data, 'related' => $related]);*/
    }

    public function category($cate){
      $category           = Kupon::where('category',$cate)->paginate(9);
      return View::make('web.page.kupon')->with(['kupon' => $category]);
    }

    public function aktivasi(){
        return View::make('web.page.aktivasi');
    }
    
    public function signin(Request $request){
        $kupon1            = new Kupon();
        $kupon = $kupon1::all();
        return View::make('web.page.sign_in_sign_up')->with(['kupon' => $kupon]);
    }

    public function edit($id){
        $kupon1            = new Kupon();
        $kupon=$kupon1::where('_id',$id)->get();//<<< method ini sama dengan kupon::find($id)
        return View::make('web.page.sign_in_sign_up')->with(['kupon' => $kupon]);
    }

    public function submit(){

    //$data = array(
    //  'nama' => Input::get('nama'),
    //  'email' => Input::get('email'),
    //  'comment' => Input::get('comment'),
    //);

    //DB::table('movie-star')->insert($data);
       $kupon1             = new Kupon();
       $kupon1             = Request::all();
       kupon::create($kupon1);
       return Redirect::to('/');
    }

    public function update()
    {
       $kupon1             = new Kupon();
       $kuponUpdate        = Request::all();
       $id                 = Input::get('_id');
       $kupon              = kupon::find($id);
       $kupon->update($kuponUpdate);
       return Redirect::to('/signin');
    }

    public function destroy($id)
    {
       $kupon1             = new Kupon();
       $kupon1::where('_id',$id)->delete();
       return Redirect::to('/signin');
    }

    public function search(){
      //dd(Input::get('end_price'));
      $input               = Input::all();
      if($input['deal'] != null && $input['location'] == null && $input['start_price'] == null && $input['end_price'] == null ){
          if($input['cat'] == 'Terbaru'){
              $kupon           = Kupon::where('title','like','%'.$input['deal'].'%')->orderBy('published_at', 'desc')->paginate(12);
          }
          else if($input['cat'] == 'Termurah'){
              $kupon           = Kupon::where('title','like','%'.$input['deal'].'%')->orderBy('price', 'asc')->paginate(12);
          }
          else if($input['cat'] == 'Termahal'){
              $kupon           = Kupon::where('title','like','%'.$input['deal'].'%')->orderBy('price', 'desc')->paginate(12);
          }
      }
      else if($input['deal']!= null && $input['location'] == null && $input['start_price'] != null && $input['end_price'] != null ){
          if($input['cat'] == 'Terbaru'){
              $kupon           = Kupon::where('title','like','%'.$input['deal'].'%')->whereBetween('price',[(int)$input['start_price'],(int)$input['end_price']])->orderBy('published_at', 'desc')->paginate(12);
          }
          else if($input['cat'] == 'Termurah'){
              $kupon           = Kupon::where('title','like','%'.$input['deal'].'%')->whereBetween('price',[(int)$input['start_price'],(int)$input['end_price']])->orderBy('price', 'asc')->paginate(12);
          }
          else if($input['cat'] == 'Termahal'){
              $kupon           = Kupon::where('title','like','%'.$input['deal'].'%')->whereBetween('price',[(int)$input['start_price'],(int)$input['end_price']])->orderBy('price', 'desc')->paginate(12);
          }
      }
      else if($input['deal']== null && $input['location'] == null && $input['start_price'] != null && $input['end_price'] != null ){
          if($input['cat'] == 'Terbaru'){
              $kupon           = Kupon::whereBetween('price',[(int)$input['start_price'],(int)$input['end_price']])->orderBy('published_at', 'desc')->paginate(12);
          }
          else if($input['cat'] == 'Termurah'){
              $kupon           = Kupon::whereBetween('price',[(int)$input['start_price'],(int)$input['end_price']])->orderBy('price', 'asc')->paginate(12);
          }
          else if($input['cat'] == 'Termahal'){
              $kupon           = Kupon::whereBetween('price',[(int)$input['start_price'],(int)$input['end_price']])->orderBy('price', 'desc')->paginate(12);
          }
      }
      else if($input['deal']== null && $input['location'] != null && $input['start_price'] == null && $input['end_price'] == null ){
          if($input['cat'] == 'Terbaru'){
              $kupon           = Kupon::where('location','like','%'.$input['location'].'%')->orderBy('published_at', 'desc')->paginate(12);
          }
          else if($input['cat'] == 'Termurah'){
              $kupon           = Kupon::where('location','like','%'.$input['location'].'%')->orderBy('price', 'asc')->paginate(12);
          }
          else if($input['cat'] == 'Termahal'){
              $kupon           = Kupon::where('location','like','%'.$input['location'].'%')->orderBy('price', 'desc')->paginate(12);
          }
      }
      else if($input['deal'] != null && $input['location'] != null && $input['start_price'] != null && $input['end_price'] != null ){
          if($input['cat'] == 'Terbaru'){
              $kupon           = Kupon::where('title','like','%'.$input['deal'].'%')->where('location','like','%'.$input['location'].'%')->whereBetween('price',[(int)$input['start_price'],(int)$input['end_price']])->orderBy('published_at', 'desc')->paginate(12);
          }
          else if($input['cat'] == 'Termurah'){
              $kupon           = Kupon::where('title','like','%'.$input['deal'].'%')->where('location','like','%'.$input['location'].'%')->whereBetween('price',[(int)$input['start_price'],(int)$input['end_price']])->orderBy('price', 'asc')->paginate(12);
          }
          else if($input['cat'] == 'Termahal'){
              $kupon           = Kupon::where('title','like','%'.$input['deal'].'%')->where('location','like','%'.$input['location'].'%')->whereBetween('price',[(int)$input['start_price'],(int)$input['end_price']])->orderBy('price', 'desc')->paginate(12);
          }
      }
      else if($input['deal'] != null && $input['location'] != null && $input['start_price'] == null && $input['end_price'] == null ){
          if($input['cat'] == 'Terbaru'){
              $kupon           = Kupon::where('title','like','%'.$input['deal'].'%')->where('location','like','%'.$input['location'].'%')->orderBy('published_at', 'desc')->paginate(12);
          }
          else if($input['cat'] == 'Termurah'){
              $kupon           = Kupon::where('title','like','%'.$input['deal'].'%')->where('location','like','%'.$input['location'].'%')->orderBy('price', 'asc')->paginate(12);
          }
          else if($input['cat'] == 'Termahal'){
              $kupon           = Kupon::where('title','like','%'.$input['deal'].'%')->where('location','like','%'.$input['location'].'%')->orderBy('price', 'desc')->paginate(12);
          }
      }
      else if($input['deal'] == null && $input['location'] == null && $input['start_price'] == null && $input['end_price'] == null){
          if($input['cat'] == 'Terbaru'){
              $kupon           = Kupon::orderBy('published_at', 'desc')->paginate(12);
          }
          else if($input['cat'] == 'Termurah'){
              $kupon           = Kupon::orderBy('price', 'asc')->paginate(12);
          }
          else if($input['cat'] == 'Termahal'){
              $kupon           = Kupon::orderBy('price', 'desc')->paginate(12);
          }
      }
      return View::make('web.page.kupon')->with(['kupon' => $kupon]);
    }
    
    public function info(){
       $data = array(
            array('title' => 'About Us', 
                  'isi' => 'AdaPromo.id dibuat sebagai media promosi bagi para pelaku usaha yang ingin mempromosikan produk atau jasanya melalui sebuah website yang bisa dilihat oleh kalangan luas.')
            );
        $data = json_encode($data);
        $related = array(
            array('title' => 'Promo Ekstra Diskon Pembelian ASUS, ACER & Gigabyte', 
                  'isi' => 'Welcome To The Online Best Model Winner Contest At Look Of the Year. Syarat dan Ketentuan Berlaku.'),
            array('title' => 'Promo Ekstra Diskon Pembelian ASUS, ACER & Gigabyte', 
                  'isi' => 'Welcome To The Online Best Model Winner Contest At Look Of the Year. Syarat dan Ketentuan Berlaku.'),
            array('title' => 'Promo Ekstra Diskon Pembelian ASUS, ACER & Gigabyte', 
                  'isi' => 'Welcome To The Online Best Model Winner Contest At Look Of the Year. Syarat dan Ketentuan Berlaku.')
            );
        $related = json_encode($related);
        return View::make('web.page.info')->with(['data' => $data, 'related' => $related]);
    }
}