<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public $timestamps=false;
    protected $fillable=['name','body'];

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }
}
