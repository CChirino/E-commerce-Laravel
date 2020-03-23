<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{   
    protected $fillable=['name','slug','description'];    

    public function product(){
        return $this->hasMany(products::class,'category_id','id');
    }
}
