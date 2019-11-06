<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class JeuxController extends Controller
{
    function index(){
        return view('jeu');
    }

    function add (Request $request){
        $array= Validator::make($request->all(), [
            'titre' => 'required|max:255',
            'editeur' => 'required',
            'prix' => 'required',
            'resume' => 'required',
        ], ['required' => 'l\'attribut :attribute est requis'])->validate();

        DB::table('jeux')->insert( 
            $array
        );
        

        return json_encode($array);
    }


    function all(){
     $listeJeux= DB::table('jeux')->get();
        return json_encode($listeJeux);
    }


}
