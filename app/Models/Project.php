<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $fillable = ['name','description','status'];
    public function contacters(){
        return $this->hasMany(Contacter::class);
    }
    public static function updateproject($request,$id){
        updateOrCreate(
            ['id'=>$id],
            ['name' => $request->name, 'description' => $request->description],
            ['status' => $request->status]
        );

    }
}
