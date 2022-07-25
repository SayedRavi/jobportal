<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\Jobs\Job;

class Company extends Model
{
    use HasFactory;

    public $guarded = [];
    public function jobs()
    {
        //One to Many
        return $this->hasMany(Job::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
