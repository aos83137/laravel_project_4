<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public $timestamps=false;
    protected $table = "members";
    protected $fillable=['name','body','img'];


}
