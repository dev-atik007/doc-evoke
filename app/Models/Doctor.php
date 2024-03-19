<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    // public function assistant()
    // {
    //     return $this->hasMany(Assistant::class);
    // }

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
