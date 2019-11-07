<?php

namespace App\Http\Controllers;

use App\Jeux;
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

            $jeux = Jeux::updateOrCreate(
                $array
            )->save();


        return json_encode($array);
    }




    function all(){

        $listeJeux= Jeux::all();
        return json_encode($listeJeux);
    }



    function supp(Request $request){

        $val= Validator::make($request->all(),[
            'id' => 'required|numeric'
        ],

        ['required' => 'l\'attribut :attribute est requis'])->validate();

       
        Jeux::find($val['id'])->delete();


        return json_encode($val['id']);
    }



    function displayjeu($id){
        
        $jeu= Jeux::find($id);
        if(!isset($jeu)){
            //return 
        }

        return view('jeu',['jeu'=>$jeu]);
    }


}
