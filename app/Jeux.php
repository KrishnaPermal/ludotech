<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jeux extends Model
{
    protected $table = 'jeux';

    protected $fillable= ['titre', 'editeur', 'prix', 'resume'];
}
