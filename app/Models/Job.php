<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @method static find($id)
 */
class Job extends Model
{
    use HasFactory;

// protected $table = 'job';
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function company()
    {
        //One to Many (Inverse)
        return $this->belongsTo(Company::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function checkApplication()
    {
        return DB::table('job_user')->where('user_id',auth()->user()->id)
            ->where('job_id',$this->id)->exists();
    }
}
