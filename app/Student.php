<?php

namespace sidelines;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // The attributes that are mass assignable.
    protected $fillable = ['lname', 'fname', 'mname', 'gender', 'address',
            'date_of_birth', 'address', 'yr_lvl', 'contact_no', 'about_me',
            'education', 'achievements', 'seminars', 'organizations'];

    public function user() {
        return $this->morphOne('sidelines\User', 'userable');
    }

    public function school()
    {
        return $this->belongsTo('sidelines\School');
    }

    public function skills()
    {
        return $this->belongsToMany('sidelines\Skill')->withTimestamps();
    }

    public function getSkillListAttribute()
    {
        return $this->skills->lists('name')->toArray();
    }

    public function applications()
    {
        return $this->belongsToMany('sidelines\Job', 'applications')->withTimestamps();
    }

    public function degree()
    {
        return $this->belongsTo('sidelines\Degree');
    }

    public function recommendations()
    {
        return $this->belongsToMany('sidelines\DeanFaculty', 'recommendations')
                    ->withPivot('id', 'recommendation_details', 'attachments')
                    ->withTimestamps();
    }
}
