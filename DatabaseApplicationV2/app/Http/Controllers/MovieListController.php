<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

use App\Movie;

class MovieListController extends Controller{
public function add(Request $request, $id){
   $movie = Movie::find($id);
   // Session::flush();
   // Session::push('item', get_object_vars($moive));
   $request->session()->push('item',$movie);
   $items=Session::get('item');
   return redirect('/list/view');
 }
 public function viewList(){
   $items=Session::get('item');
   if(count($items) == 0)
   {
     return view('/movies/emptyMovieList');
   }
   else
   {
     return view('/movies/movieList',compact('items'));
   }
 }
 public function delete($id){
   $items=Session::get('item');
   foreach ( Session::get('item') as $key=>$item) {
     if ($key==$id) {
       Session::pull('item.'.$key);
     }
   }
   return redirect('/list/view');
 }
 public function clear(){
   Session::forget('item');
   return redirect('/list/view');
 }
}
