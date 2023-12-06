<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogadores extends Model
{
  //  use HasFactory;
    protected $fillable = ['jogadores_id','name','nivel','tipo','check_confirmacao'];
}
