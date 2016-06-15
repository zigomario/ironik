<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;




class Categories extends Model
{

    protected $table = 'categories';


    public $timestamps = true;

    /**
     * retourne toutes les photos
     */
    public function getAllPost()
    {

        // retourne le resultat de la requete SELECT * FROM categories
        return DB::table('categories')->get();


    }


    /***************************************************** Relationships ***********************************************************/

    /**
     * Relation avec la classe Memes
     * One To Many 1..n
     * le nom de la méthode () doot porter le nom de
     * ma table mis en relation. ( ici post )
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        // namespace + nom de la classe mis en relation
        return $this->hasMany('App\Http\Models\Posts');
    }




}
