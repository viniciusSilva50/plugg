<?php

namespace App\Http\Controllers;

use App\Repository\Marvel;
use Illuminate\Http\Request;

class HomeController extends Controller{

    public function index(){
        $marvel = new Marvel();
        $characters = $marvel->getCharacters();

        return view('pages.admin.character.list')->with(['characters' => $characters]);
    }

}
