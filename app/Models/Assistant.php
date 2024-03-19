<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Assistant extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
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
