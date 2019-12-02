<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = ['filename', 'bytes', 'mime'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function getBytesAttribute($value)
    {
        return format_filesize($value);
    }

    public function getUrlAttribute()
    {
        return url('files/'.$this->filename);
    }
}