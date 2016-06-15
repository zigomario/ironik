<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Comments extends Model
{

    protected $table = 'comments';


    public $timestamps = true;

    /**
     * retourne toutes les photos
     */
    public function getAllComments()
    {

        // retourne le resultat de la requete SELECT * FROM categories
        return DB::table('comments')->get();


    }


    /***************************************************** Relationships ***********************************************************/

    /**
     * Retourne la catégorie à laquelle appartient un objet Memes
     * Many To One : n..1.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */


    public function posts(){

        return $this->belongsTo('App\Http\Models\Posts');
    }

    public function users()
    {
        return $this->belongsTo('App\Http\Models\Users');
    }











    /**************************function*************************************/


    public function commentsorder($posts){


        $results = DB::table('comments')
                ->where('posts_id', $posts)
                ->orderBy('id','desc')
                ->get();

        return $results;
    }





    public function countComments($id)
    {

        $results = DB::table('comments')
            ->where('posts_id','=',$id)
            ->count();


        return $results;

    }



}
