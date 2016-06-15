<?php

namespace App\Http\Controllers;

use App\Http\Models\Categories;
use App\Http\Requests;
use App\User;
use App\Http\Requests\ProfilRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProfilSettingController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $categories = Categories::all();

        return view('Formulaire.profil_settings', [


            'categories' => $categories,

        ]);
    }

    public function store(ProfilRequest $request){


        $users = User::find(Auth::user()->id);

        /*Je mets en array tout en filtrant ce qui n'est pas rempli - voir fonction array_filter
        *  Ici je filtre le retour de tableau request en retirant le token
        */
        $inputs = array_filter(
            $request->except(['_token'])
        );
//
//        $users->description = $request -> description;
//        $users->name = $request->name;
//        $users->lastname= $request->lastname;
//        $users->username=$request->username;
//        $users->city=$request->city;
//        $users->naissance=$request->naissance;
//        $users->email=$request->email;
//        $users->password=bcrypt( $request->password);
//
//        $filename = "";
//

        //image et password devant subir des opérations avant l'enregistrement effectifs, ils ne peuvent pas être mis dan le tableua d'input classique
        // Il Faut alors les conditionner individuellement ( si l'input n'est pas vide => tu save() )


        if($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName(); // Récupère le nom original du fichier
            $destinationPath = public_path() . '/uploads/photos'; // Indique où stocker le fichier
            $file->move($destinationPath, $filename); // Déplace le fichier


            //mise à jour de la propriété de l'objet Categories
            $users->avatar = asset("uploads/photos/". $filename);

        }

        $users->fill($inputs);
        $users->save();

        if(!empty($request->password)){

            $users->password=bcrypt($request->password);
        }

        $users->save();




        return Redirect::route('home_index');


    }


}
