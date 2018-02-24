<?php

namespace TCCP\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryCost extends Model
{
    // define os tipos de dados que podem ser incluidos nesse campo
    // se vier algum outro tipo de dado o Eloquent não irá aceitar
    //MAss Assigment
    protected $fillable = ["id","name"];    
}