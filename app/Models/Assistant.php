<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Assistant extends Authenticatable
{
    use HasFactory;
    protected $guarded = ['id'];

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'assistant_doctor_tracks')->with('department', 'location')->withTimestamps();
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'assistant');
    }

    public function statusBadge($status)
    { 
        $html = '';
        if($status == 1){
            $html = '<span class="badge badge--success">' . trans('Active') . '</span>';
            } else {
                $html = '<span><span class="badge badge--warning">' . trans('Inactive') . '</span></span>';
            }
            return $html;
    }
}
