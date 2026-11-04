<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable = [
        'company_profile',
        'whatsapp',
        'maps_office',
        'email_contact',
        'office_contact',
        'address',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
