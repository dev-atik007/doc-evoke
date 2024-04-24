<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    use HasFactory;

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'staff');
    }

    public function statusBadge($status)
    { 
        $html = '';
        if($status ==1){
            $html = '<span class="badge badge--success">' . trans('Active') . '</span>';
            } else {
                $html = '<span><span class="badge badge--warning">' . trans('Inactive') . '</span></span>';
            }
            return $html;
    }
}
