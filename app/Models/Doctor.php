<?php

namespace App\Models;

use App\Constants\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Doctor extends Authenticatable
{
    use HasFactory;
   
    protected $casts = [
        'serial_or_slot' => 'object',
    ];

    protected $guarded = ['id'];

    public function AssistantDoctorTrack()
    {
        return $this->hasMany(AssistantDoctorTrack::class);
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
        return $this->hasMany(Appointment::class);
    }
    
    public function isCompleteappointments()
    {
        return $this->hasMany(Appointment::class)->where('is_complete',1);
    }

    public function staffs()
    {
        return $this->hasMany(Staff::class);
    }

    

    public function statusBadge($status)
    {
        $html = '';
        if ($status == 1) {
            $html = '<span class="badge badge--success">' . trans('Active') . '</span>';
        } else {
            $html = '<span><span class="badge badge--warning">' . trans('Inactive') . '</span></span>';
        }
        return $html;
    }

    // public function featureBadge()
    // {
    //     $html = '';
    //     if($this->featured == Status::YES)
    //     {
    //         $html = '<span class="badge badge--success">' . trans('Featured') . '</span>';
    //     } else {
    //         $html = $html = '<span class="badge badge--warning">' . trans("Non Featured") . '</span>';
    //     }
    //     return $html;
    // }
}
