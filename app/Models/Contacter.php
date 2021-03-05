<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacter extends Model
{

    use HasFactory;
    public $timestamps=false;
    protected $fillable=['name','email'];

    public static function getContactersByPid($id){
       $contacters= Contacter::where('project_id', $id)->get();
        return $contacters;
    }
}
