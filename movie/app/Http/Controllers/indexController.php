<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\genre;
use App\Models\country;
use App\Models\movie;

class indexController extends Controller
{
    public function home(){
        $category = category::orderBy('id','DESC')->get();
        $genre = genre::orderBy('id','DESC')->get();
        $country = country::orderBy('id','DESC')->get();
        return view('pages.home',compact('category','genre','country'));
    }
    public function category($slug){
        $category = category::orderBy('id','DESC')->get();
        $genre = genre::orderBy('id','DESC')->get();
        $country = country::orderBy('id','DESC')->get();
        $cate_slug = category::where('slug',$slug)->first();
        return view('pages.category',compact('category','genre','country','cate_slug'));
    }
    public function genre($slug){
        $category = category::orderBy('id','DESC')->get();
        $genre = genre::orderBy('id','DESC')->get();
        $country = country::orderBy('id','DESC')->get();
        return view('pages.genre',compact('category','genre','country'));
       
    }
    public function conntry($slug){
        $category = category::orderBy('id','DESC')->get();
        $genre = genre::orderBy('id','DESC')->get();
        $country = country::orderBy('id','DESC')->get();
        return view('pages.country',compact('category','genre','country'));
        
    }
    public function movie($slug){
        return view('pages.movie');
    }
    public function watch($slug){
        return view('pages.watch');
    }
    public function episode($slug){
        return view('pages.episode');
    }
   


}
