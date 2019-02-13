<?php

namespace sidelines;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function jobs()
    {
        return $this->belongsToMany('sidelines\Job')->withTimestamps();
    }
}
