<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Movie;
class MovieController extends Controller
{
    public function index(){
      $movies= Movie::get();
      return view('movies/index', compact('movies'));
    }

    public function create(){

    }

    public function store(){

    }

    public function show(){

    }

    public function edit(){

    }
}
