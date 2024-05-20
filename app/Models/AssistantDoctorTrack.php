<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssistantDoctorTrack extends Model
{
    use HasFactory;

    public function assistant()
    {
        return $this->belongsTo(Assistant::class);
    }
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
    
}
